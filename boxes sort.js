function doStuff() {
	// Set to save scroll location onclick
	var elements = document.getElementsByTagName('a');
	for(var i = 0, len = elements.length; i < len; i++) {
    	elements[i].onclick = function(){ checkScroll(); } ;
	}

	// Other
	var other = getCookie("other");
	if (other == null || other == "" || isNaN(other)) {
		setCookie("other", 1, 365);
	}
	setOther(false);

	// Minisodes
	var M = getCookie("M");
	if (M == null || M == "" || isNaN(M)) {
		setCookie("M", 1, 365);
	}
	setM(false);
	
	// Alien Files
	var AF = getCookie("AF");
	if (AF == null || AF == "" || isNaN(AF)) {
		setCookie("AF", 1, 365);
	}
	setAF(false);
	
	// Missing episodes
	var missing = getCookie("missing");
	if (missing == null || missing == "" || isNaN(missing)) {
		setCookie("missing", 0, 365);
	}
	setMissing(false);

	// Sarah Jane Adventures
	var SJA = getCookie("SJA");
	if (SJA == null || SJA == "" || isNaN(SJA)) {
		setCookie("SJA", 0, 365);
	}
	setSJA(false);
	
	// Torchwood
	var TW = getCookie("TW");
	if (TW == null || TW == "" || isNaN(TW)) {
		setCookie("TW", 0, 365);
	}
	setTW(false);
	
	// New Who
	var NW = getCookie("NW");
	if (NW == null || NW == "" || isNaN(NW)) {
		setCookie("NW", 1, 365);
	}
	setNW(false);
	
	// Classic Who
	var CW = getCookie("CW");
	if (CW == null || CW == "" || isNaN(CW)) {
		setCookie("CW", 0, 365);
	}
	setCW(false);
};


// *** A ***********************************************************************

function setNW(bool) {
	var NW =  parseInt(getCookie("NW"), 10);
	
	if (bool) {
    	NW = NW + 1;
    	setCookie('NW', NW, 365);
    }
    
	var state = isOn("NW");
	var c = !isOn("M");
	var a = !isOn("AF");
	var b = !isOn("other");
	
	var x = document.getElementsByClassName("NW");
	if (state) {
    	for (var i = 0; i < x.length; i++) {
    			x[i].style.display = "none";
    			x[i].nextSibling.style.display = "none";
		};
		document.getElementById("newWhoBox").checked = false;
	} else {
		setOneOn("NW");
		if (c) {
			setTwoOn("NW", "M");
		} 
		if (a) {
			setTwoOn("NW", "AF");
		} 
		if(b) {
			setTwoOn("NW", "other");
		}
		document.getElementById("newWhoBox").checked = true;
	};
}

function setTW(bool) {
	var TW =  parseInt(getCookie("TW"), 10);
	
	if (bool) {
    	TW = TW + 1;
    	setCookie('TW', TW, 365);
    }
    
	var state = isOn("TW");
	var c = !isOn("M");
	var a = !isOn("AF");
	var b = !isOn("other");
	
	var x = document.getElementsByClassName("TW");
	if (state) {
    	for (var i = 0; i < x.length; i++) {
    		x[i].style.display = "none";
    		x[i].nextSibling.style.display = "none";
    		document.getElementById("MD").style.display = "none";
    		document.getElementById("COE").style.display = "none";	
		};
		document.getElementById("torchwoodBox").checked = false;
	} else {
		setOneOn("TW");
		document.getElementById("MD").style.display = "inline-block";
    	document.getElementById("COE").style.display = "inline-block";	
		if (c) {
			setTwoOn("TW", "M");
		} 
		if (a) {
			setTwoOn("TW", "AF");
		}
		if(b) {
			setTwoOn("TW", "other");
		}
		document.getElementById("torchwoodBox").checked = true;
	};
}

function setSJA(bool) {
	var SJA =  parseInt(getCookie("SJA"), 10);
	
	if (bool) {
    	SJA = SJA + 1;
    	setCookie('SJA', SJA, 365);
    }
    
	var state = isOn("SJA");
	var c = !isOn("M");
	var a = !isOn("AF");
	var b = !isOn("other");
	
	var x = document.getElementsByClassName("SJA");
	if (state) {
    	for (var i = 0; i < x.length; i++) {
    		x[i].style.display = "none";
    		x[i].nextSibling.style.display = "none";
		};
		document.getElementById("SJABox").checked = false;
	} else {
		setOneOn("SJA");
		if (c) {
			setTwoOn("SJA", "M");
		} 
		if (a) {
			setTwoOn("SJA", "AF");
		} 
		if(b) {
			setTwoOn("SJA", "other");
		}
		document.getElementById("SJABox").checked = true;
	};
}

function setCW(bool) {
	var CW =  parseInt(getCookie("CW"), 10);
	
	if (bool) {
    	CW = CW + 1;
    	setCookie('CW', CW, 365);
    }
    
	var state = isOn("CW");
	var c = !isOn("M");
	var a = !isOn("AF");
	var b = !isOn("other");
	var d = !isOn("missing");
	
	var x = document.getElementsByClassName("CW");
	if (state) {
		document.getElementById("trial").style.display = "none";
    	document.getElementById("keyToTime").style.display = "none";
    	for (var i = 0; i < x.length; i++) {
    		x[i].style.display = "none";
    		x[i].nextSibling.style.display = "none";
		};
		document.getElementById("classicWhoBox").checked = false;
	} else {
		setOneOn("CW");
		document.getElementById("trial").style.display = "inline-block";
    	document.getElementById("keyToTime").style.display = "inline-block";
		if (c) {
			setTwoOn("CW", "M");
		} 
		if (a) {
			setTwoOn("CW", "AF");
		} 
		if (b) {
			setTwoOn("CW", "other");
		} 
		if (d) {
			setTwoOn("CW", "missing");
		}
		document.getElementById("classicWhoBox").checked = true;
	};
}

// *** B *******************************************************************************
function setM(bool) {
	var M =  parseInt(getCookie("M"), 10);
	
	if (bool) {
    	M = M + 1;
    	setCookie('M', M, 365);
    }

    var state = isOn("M");
    var a = !isOn("TW");
    var b = !isOn("SJA");
    var c = !isOn("NW");
    var d = !isOn("CW");

	var x = document.getElementsByClassName("M");
	if (state) {    												 
    	for (var i = 0; i < x.length; i++) {				 
    		x[i].style.display = "none";
    		x[i].nextSibling.style.display = "none";
		};	
		document.getElementById("minisodeBox").checked = false;		
	} else {
		if (c) {												
			setTwoOn("NW", "M");
		}
		if (a) {
			setTwoOn("TW", "M");
		} 
		if (b) {
			setTwoOn("SJA", "M");
		} 
		if (d) {
			setTwoOn("CW", "M");
		}
		document.getElementById("minisodeBox").checked = true;
	};
}

function setAF(bool) {
	var AF =  parseInt(getCookie("AF"), 10);
	
	if (bool) {
    	AF = AF + 1;
    	setCookie('AF', AF, 365);
    }

    var state = isOn("AF");
    var a = !isOn("TW");
    var b = !isOn("SJA");
    var c = !isOn("NW");
    var d = !isOn("CW");

	var x = document.getElementsByClassName("AF");
	if (state) {    												 
    	for (var i = 0; i < x.length; i++) {				 
    		x[i].style.display = "none";
    		x[i].nextSibling.style.display = "none";
		};	
		document.getElementById("alienFileBox").checked = false;		
	} else {
		if (c) {												
			setTwoOn("NW", "AF");
		} 
		if (a) {
			setTwoOn("TW", "AF");
		} 
		if (b) {
			setTwoOn("SJA", "AF");
		} 
		if (d) {
			setTwoOn("CW", "AF");
		}
		document.getElementById("alienFileBox").checked = true;
	};
}

function setOther(bool) {
	var other =  parseInt(getCookie("other"), 10);
	
	if (bool) {
    	other = other + 1;
    	setCookie('other', other, 365);
    }

    var state = isOn("other");
    var a = !isOn("TW");
    var b = !isOn("SJA");
    var c = !isOn("NW");
    var d = !isOn("CW");

	var x = document.getElementsByClassName("other");
	if (state) {    												 
    	for (var i = 0; i < x.length; i++) {				 
    		x[i].style.display = "none";
    		x[i].nextSibling.style.display = "none";
		};	
		document.getElementById("otherBox").checked = false;		
	} else {
		if (c) {												
			setTwoOn("NW", "other");
		} 
		if (a) {
			setTwoOn("TW", "other");
		} 
		if (b) {
			setTwoOn("SJA", "other");
		} 
		if (d) {
			setTwoOn("CW", "other");
		}
		document.getElementById("otherBox").checked = true;
	};
}

function setMissing(bool) {
	var missing =  parseInt(getCookie("missing"), 10);
	
	if (bool) {
    	missing = missing + 1;
    	setCookie('missing', missing, 365);
    }

    var state = isOn("missing");
    var d = !isOn("CW");

	var x = document.getElementsByClassName("missing");
	if (state) {    												 
    	for (var i = 0; i < x.length; i++) {				 
    		x[i].style.display = "none";
    		x[i].nextSibling.style.display = "none";
		};	
		document.getElementById("meBox").checked = false;		
	} else {
		if (d) {
			setTwoOn("CW", "missing");
		}
		document.getElementById("meBox").checked = true;
	};
}

// **** SortEpisodes -- used on episode pages   *******************************************
function sortEpisodes() {
	var M = document.getElementsByClassName("M");
	if (!isOn("M")) {
		for (var i = 0; i < M.length; i++) {
			M[i].style.display = "inline-block";
			M[i].nextSibling.style.display = "inline-block";
		}
	} else {
		for (var i = 0; i < M.length; i++) {
			M[i].style.display = "none";
			M[i].nextSibling.style.display = "none";
		}
	}
		
	var AF = document.getElementsByClassName("AF");
	if (!isOn("AF")) {
		for (var i = 0; i < AF.length; i++) {
			AF[i].style.display = "inline-block";
			AF[i].nextSibling.style.display = "inline-block";
		}
	} else {
		for (var i = 0; i < AF.length; i++) {
			AF[i].style.display = "none";
			AF[i].nextSibling.style.display = "none";
		}
	}
		
	var other = document.getElementsByClassName("other");
	if (!isOn("other")) {
		for (var i = 0; i < other.length; i++) {
			other[i].style.display = "inline-block";
			other[i].nextSibling.style.display = "inline-block";
		}
	} else {
		for (var i = 0; i < other.length; i++) {
			other[i].style.display = "none";
			other[i].nextSibling.style.display = "none";
		}
	}
		
	var missing = document.getElementsByClassName("missing");
	if (!isOn("missing")) {
		for (var i = 0; i < missing.length; i++) {
			missing[i].style.display = "inline-block";
			missing[i].nextSibling.style.display = "inline-block";
		}
	} else {
		for (var i = 0; i < missing.length; i++) {
			missing[i].style.display = "none";
			missing[i].nextSibling.style.display = "none";
		}
	}
}

// *** Helper Methods **************************************************************

function isOn(x) {
	var a = parseInt(getCookie(x), 10);
	return a % 2 == 0;
}

function setOneOn(x) {
	var elems = document.getElementsByClassName(x);
	
	for (var i = 0; i < elems.length; i++) {
		if (elems[i].classList.length == 1) {
			elems[i].style.display = "inline-block";
			elems[i].nextSibling.style.display = "inline-block";
		}
	};
}

function setTwoOn(a, b){
	var bElements = document.getElementsByClassName(b);

	for (var j = 0; j < bElements.length; j++) {
		if (hasClass(bElements[j], a)) {
			bElements[j].style.display = "inline-block";
			bElements[j].nextSibling.style.display = "inline-block";
		}
	}
}

function hasClass(element, cls) {
    return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}

function setCookie(c_name, value, exdays) {
    var date=new Date();
    date.setTime( date.getTime() + (exdays*24*60*60*1000) );
    expires='; expires=' + date.toGMTString();
    document.cookie=c_name + "=" + value + expires + '; path=/';
}

function getCookie(c_name) {
    var c_value = document.cookie;
    var c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1) {
        c_start = c_value.indexOf(c_name + "=");
    }
    if (c_start == -1) {
        c_value = null;
    } else {
        c_start = c_value.indexOf("=", c_start) + 1;
        var c_end = c_value.indexOf(";", c_start);
        if (c_end == -1) {
            c_end = c_value.length;
        }
        c_value = unescape(c_value.substring(c_start,c_end));
    }
    return c_value;
}

//  *** Scroll Methods ******************************************************************

function checkScroll() {
    var x = 0, y = 0;
    if( typeof( window.pageYOffset ) == 'number' ) {
        //Netscape compliant
        y = window.pageYOffset;
        x = window.pageXOffset;
    } else if( document.body && ( document.body.scrollLeft || document.body.scrollTop ) ) {
        //DOM compliant
        y = document.body.scrollTop;
        x = document.body.scrollLeft;
    } else if( document.documentElement && 
    ( document.documentElement.scrollLeft || document.documentElement.scrollTop ) ) {
        //IE6 standards compliant mode
        y = document.documentElement.scrollTop;
        x = document.documentElement.scrollLeft;
    }
	setCookie("location", y, 365);
};

function actuallyScroll() {
	window.scroll(0, parseInt(getCookie("location"), 10));
}
