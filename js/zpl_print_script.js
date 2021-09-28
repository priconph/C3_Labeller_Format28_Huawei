/**
* Optionally used to deploy multiple versions of the applet for mixed
* environments.  Oracle uses document.write(), which puts the applet at the
* top of the page, bumping all HTML content down.
*/

var java_enabled = navigator.javaEnabled();
if(java_enabled){
	deployQZ();
}else{
	var html  = '<div class="alert alert-danger">';
		html += '	Java is not loaded properly. You may not be able to print labels without Java.<br>';
		html += '	You may call ISS <b>local 205</b> to address the concern.';
		html += '</div>';
	$('#div_system_message').append(html);
}


/**
* Deploys different versions of the applet depending on Java version.
* Useful for removing warning dialogs for Java 6.  This function is optional
* however, if used, should replace the <applet> method.  Needed to address 
* MANIFEST.MF TrustedLibrary=true discrepency between JRE6 and JRE7.
*/
function deployQZ() {
	var attributes = {id: "qz", code:'qz.PrintApplet.class', 
		archive:'../LabelPrinter/qz-print.jar', width:1, height:1};
	var parameters = {jnlp_href: '../LabelPrinter/qz-print_jnlp.jnlp', 
		cache_option:'plugin', disable_logging:'false', 
		initial_focus:'false'};
	if (deployJava.versionCheck("1.7+") == true) {}
	else if (deployJava.versionCheck("1.6+") == true) {
		attributes['archive'] = '../LabelPrinter/jre6/qz-print.jar';
		parameters['jnlp_href'] = '../LabelPrinter/jre6/qz-print_jnlp.jnlp';
	}
	deployJava.runApplet(attributes, parameters, '1.5');
}

/**
* Automatically gets called when applet has loaded.
*/
function qzReady() {
	// Setup our global qz object
	window["qz"] = document.getElementById('qz');
	var title = document.getElementById("title");
	if (qz) {
				/*
		try {
			title.innerHTML = title.innerHTML + " " + qz.getVersion();
			document.getElementById("content").style.background = "#F0F0F0";
		} catch(err) { // LiveConnect error, display a detailed meesage
			document.getElementById("content").style.background = "#F5A9A9";
			alert("ERROR:  \nThe applet did not load correctly.  Communication to the " + 
				"applet has failed, likely caused by Java Security Settings.  \n\n" + 
				"CAUSE:  \nJava 7 update 25 and higher block LiveConnect calls " + 
				"once Oracle has marked that version as outdated, which " + 
				"is likely the cause.  \n\nSOLUTION:  \n  1. Update Java to the latest " + 
				"Java version \n          (or)\n  2. Lower the security " + 
				"settings from the Java Control Panel.");
	  }
				*/
  }
}

/**
* Returns whether or not the applet is not ready to print.
* Displays an alert if not ready.
*/
function notReady() {
	// If applet is not loaded, display an error
	if (!isLoaded()) {
		return true;
	}
	// If a printer hasn't been selected, display a message.
	else if (!qz.getPrinter()) {
		alert('Please select a printer first by using the "Detect Printer" button.');
		return true;
	}
	return false;
}

/**
* Returns is the applet is not loaded properly
*/
function isLoaded() {
	if (!qz) {
		alert('Error:\n\n\tPrint plugin is NOT loaded!');
		return false;
	} else {
		try {
			if (!qz.isActive()) {
				alert('Error:\n\n\tPrint plugin is loaded but NOT active!');
				return false;
			}
		} catch (err) {
			alert('Error:\n\n\tPrint plugin is NOT loaded properly!');
			return false;
		}
	}
	return true;
}

/**
* Automatically gets called when "qz.print()" is finished.
*/
function qzDonePrinting() {
	// Alert error, if any
	if (qz.getException()) {
		alert('Error printing:\n\n\t' + qz.getException().getLocalizedMessage());
		qz.clearException();
		return; 
	}
	
	// Alert success message
	alert('Successfully sent print data to "' + qz.getPrinter() + '" queue.');
}

		
/***************************************************************************
* Prototype function for finding the closest match to a printer name.
* Usage:
*    qz.findPrinter('zebra');
*    window['qzDoneFinding'] = function() { alert(qz.getPrinter()); };
***************************************************************************/
function findPrinter(name,array_label) {
	if (isLoaded()) {
		// Searches for locally installed printer with specified name
		qz.findPrinter(name);
		
		// Automatically gets called when "qz.findPrinter()" is finished.
		window['qzDoneFinding'] = function() {
			var p = document.getElementById('printer');
			var printer = qz.getPrinter();
			
			/* check if printer exist */
			if(printer !== null){
				for(x=0;x<array_label.length;x++){
					printZPL(array_label[x]);
				}
			}else{
				alert('Warning: Zebra Printer Not Found!');
			}
			// Remove reference to this function
			window['qzDoneFinding'] = null;
		};
	}
}

 
/***************************************************************************
* Prototype function for printing raw ZPL commands
* Usage:
*    qz.append('^XA\n^FO50,50^ADN,36,20^FDHello World!\n^FS\n^XZ\n');
*    qz.print();
***************************************************************************/     
function printZPL(label) {
	if (notReady()) { return; }
	// Send characters/raw commands to qz using "append"
	// This example is for ZPL.  Please adapt to your printer language
	// Hint:  Carriage Return = \r, New Line = \n, Escape Double Quotes= \"
	qz.append('^XA\n');
			//qz.append('^FO50,50^ADN,36,20^FDPRINTED USING QZ PRINT PLUGIN ' + qz.getVersion() + '\n');
	qz.appendImage('ZPLII');
	qz.append(label);
	// var sticker  = '^FO180,256,^CF0,36^FD';
		// sticker += '<REMARKS>';
		// sticker += '^FS';
	// qz.append(sticker);			
	// Automatically gets called when "qz.appendImage()" is finished.
	window['qzDoneAppending'] = function() {
		// Append the rest of our commands
		qz.append('^FS\n');
		qz.append('^XZ\n');  
		
		// Tell the apple to print.
		qz.print();
		
		// Remove any reference to this function
		window['qzDoneAppending'] = null;
	};
}

	
/***************************************************************************
****************************************************************************
* *                          HELPER FUNCTIONS                             **
****************************************************************************
***************************************************************************/


/***************************************************************************
* Gets the current url's path, such as http://site.com/example/dist/
***************************************************************************/
function getPath() {
	var path = window.location.href;
	return path.substring(0, path.lastIndexOf("/")) + "/";
}

/**
* Fixes some html formatting for printing. Only use on text, not on tags!
* Very important!
*   1.  HTML ignores white spaces, this fixes that
*   2.  The right quotation mark breaks PostScript print formatting
*   3.  The hyphen/dash autoflows and breaks formatting  
*/
function fixHTML(html) {
	return html.replace(/ /g, "&nbsp;").replace(/’/g, "'").replace(/-/g,"&#8209;"); 
}

/**
* Equivelant of VisualBasic CHR() function
*/
function chr(i) {
	return String.fromCharCode(i);
}

