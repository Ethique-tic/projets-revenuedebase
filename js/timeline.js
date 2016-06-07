

function timeline(data,div_timeline)
{
	this.data = new Array();
	this.div_timeline = div_timeline;

	this.div_timeline.innerHTML = 
           '<div id="timeline-scroll-hider" ></div> ' 
      /*  +	'<div id="timeline-big-separator"  class="hidden-xs"></div>' */
        + '<div id="timeline-frise-selector-left"></div>'  
        + '<div id="timeline-frise">    '
        +    '<div id="timeline-img" > '  
        +	'</div>'
        + '</div>  ' 
        + '</div>  ' 
        +  '<div id="timeline-infos-title"></div>'
        + '<div id="timeline-infos" >  ' 
        +   '<div id="timeline-infos-text">' 
        +   '</div>'  
        +   '<div id="timeline-infos-carto-cadre"></div>'
        +   '<div id="timeline-infos-carto">'
        +   	'<div style="position:absolute;width:100%;bottom:-15px;text-align:center;"></div>'
        +   	'<div style="position:absolute;width:100%;top:-15px;text-align:center;">Portée du changement</div>'
        +   	'<div style="position: absolute;width: 100%;top: 15px;text-align: center;transform: rotate(-90deg);left: 50%;margin-left: -50%;padding-bottom: 20px;-webkit-transform: rotate(-90deg);-ms-transform: rotate(-90deg);-o-transform: rotate(-90deg);">Grande</div>'
        +   	'<div style="position: absolute;width: 100%;bottom:-15px;text-align: center;transform: rotate(-90deg);left: 50%;margin-left: -50%;padding-bottom: 20px;-webkit-transform: rotate(-90deg);-ms-transform: rotate(-90deg);-o-transform: rotate(-90deg);">Petite</div>'
        +   	'<div style="position:absolute;left:-10px;width:100%;bottom:50%;text-align:left;">Gauche</div>'
        +   	'<div style="position:absolute;width:100%;bottom:50%;text-align:right;">Droite</div>'
        +		'<div id="timeline-carto-x-axis"></div>'
        +		'<div id="timeline-carto-y-axis"></div>'
        +   '</div>'
        + '</div>'
        ;

	this.frise = $(div_timeline).children("#timeline-frise")[0]; 
	this.infos_div = $(div_timeline).children("#timeline-infos")[0];
	this.infos_div_title = $(div_timeline).children("#timeline-infos-title")[0]; 
	this.infos_div_texte = $(this.infos_div).children("#timeline-infos-text")[0];
	this.infos_div_carto = $(this.infos_div).children("#timeline-infos-carto")[0];

 
	var this_out = this;
	/*console.log(this.frise);*/
	$(this.frise).scroll(
	function()
	{
		this_out.userIsScrolling();
	});

	function infosData(data)
	{  
		this.date = data[0];
		this.titre = data[1];
		this.texte = data[2];
	    this.img_enable = data[5];
	    this.img_disable = data[6];

		this.div_frise = document.createElement("div"); 
		this.div_frise.classList.add("timeline-frise-elmt");
		this.div_frise.innerHTML = 
		'<div class="timeline-frise-date">'
	    +	'<div>'
	    +    	'<span>'+this.date+'</span>'
	    +   '</div>'
	    +'</div>'
	    +'<div class="timeline-frise-evnt-tri"> </div>'
	    +'<img class="timeline-frise-evnt" src="'+this.img_enable+'"/>'
	    ;
	    
	    this.img_photo = $(this.div_frise).children("img")[0];
	    //console.log(this.img_photo);

	    this.getTitleWithDate = function()
	    {
	    	return this.date+" : "+this.titre.substring(0,30);
	    }
	
		
		this.getDate = function()
		{
			return parseInt(this.date);
		}

	    this.div_dot = document.createElement("img"); 
	    this.div_dot.classList.add("timeline-carto-dot");
	    this.div_dot.style.left = (parseInt(data[3]))+"%";
	    this.div_dot.style.top = (parseInt(data[4]))+"%"; 

	    this.div_dot_txt = document.createElement("img"); 
	    this.div_dot.classList.add("timeline-carto-dot-text");
	    this.div_dot_txt.style.left = (parseInt(data[3]))+"%";
	    this.div_dot_txt.style.top = (parseInt(data[4]))+"%"; 

	    this.div = function()
	    {
	    	return this.div_frise;
	    }

	    this.dot = function()
	    {
	    	return this.div_dot;
	    }

	    this.move = function(pos)
	    {
	    	this.div_frise.style.top = pos+"px";
	    }

	    this.getText= function()
	    {
	    	return this.texte;
	    }

	    //this.move(parseInt(data[0]));

	    this.enableDot = function()
	    {
	    	//this.div_dot.style.backgroundColor = "#D18C00";
	    	/*this.div_dot.style.border = "3px solid #8BC5BF";*/
	    	this.div_dot.src= this.img_enable;
	    	this.img_photo.src= this.img_enable;
	    }

	    this.disableDot = function()
	    {
	    	//this.div_dot.style.backgroundColor = "#AAAAAA";
	    	/*this.div_dot.style.border = "3px solid #555555";*/
	    	this.div_dot.src= this.img_disable;
	    	this.img_photo.src= this.img_disable;
	    }

	    this.setOnClickFct = function(fct_in)
	    {
	    	var this_in = this;
	    	$(this.div_frise).children(".timeline-frise-evnt")[0].onclick 
	    			= function(){ fct_in(this_in); };
	    	this.div_dot.onclick 
	    			= function(){ fct_in(this_in); };
	    }

	}

	this.setData = function(data)
	{
		//var tmp = data.split(/\n\r|\r|\n|\\r\\n/); 
		console.log(data);
		for (var i = data.length - 1; i >= 0; i--) {
			if(data[i].length>0){
				var new_elmt = new infosData(data[i]);
				this.data.push(new_elmt);
				$(this.frise).append(new_elmt.div()); 
				$(this.infos_div_carto).append(new_elmt.dot()); 
				new_elmt.disableDot();
				new_elmt.setOnClickFct(
					function(n)
					{ 	   
						this_out.centerViewOnCloser(n); 
					}
					);
			}
		}

		this.data.sort(
                    function(a,b)
			{ 
				return a.getDate() - b.getDate();	
			});

		var pos = 300;
		for (var i =  0; i < this.data.length; i++) {
			pos+=200;
			var elemt = this.data[i].move(pos); 
		}
console.log($(this.frise).children("#timeline-img")[0].offsetHeight);
		$(this.frise).children("#timeline-img")[0].style.height = (pos+1500)+"px";
console.log($(this.frise).children("#timeline-img")[0].offsetHeight);
 
	}

	this.closerView = null;
	this.userIsScrolling = function()
	{  
		if(this.scrollTimeout != null) clearTimeout(this.scrollTimeout);
		this.scrollTimeout = setTimeout(
			function(){ 
				this_out.centerViewOnCloser();
			}, 
			50);

		var min_delta = 1000000;
		var closer = null;
		//var offsetView = this.frise.scrollTop + $(this.frise).height()/2;
		var offsetView = this.frise.scrollTop + 70;

		for (var i = this.data.length - 1; i >= 0; i--) {
			var elemt = this.data[i].div(); 
			var delta_tmp = Math.abs(elemt.offsetTop - offsetView);
			/*console.log(i+ "=>" +offsetView+" "+elemt.offsetTop+" "+delta_tmp);
			console.log(elemt);*/
			if(delta_tmp < min_delta)
			{
				min_delta = delta_tmp;
				closer = this.data[i];
			}
		}

		/*console.log("a");*/
		if(closer != null) this.closerView = closer;
		/*console.log(this.closerView);*/
	}


	this.scrolled = function() {
		/*
	  	if ((this_out.infos_div_texte.offsetHeight 
	  	+ this_out.infos_div_texte.scrollTop 
	  		>= this_out.infos_div_texte.scrollHeight) 
	  	|| (this_out.infos_div_texte.scrollHeight == this_out.infos_div_texte.offsetHeight))
		{
	    	console.log("end"); 
			$(this_out.infos_div).children("#timeline-infos-text-bottom-shadow")[0].style.visibility = "hidden";

	  	}
	  	else
	  	{
			$(this_out.infos_div).children("#timeline-infos-text-bottom-shadow")[0].style.visibility = "visible"; 
	  	}

		if(this_out.infos_div_texte.scrollTop == 0)
		{
			console.log("top");
			$(this_out.infos_div).children("#timeline-infos-text-top-shadow")[0].style.visibility = "hidden";  
		}
		else
		{
			$(this_out.infos_div).children("#timeline-infos-text-top-shadow")[0].style.visibility = "visible"; 
		}
 
*/
	}

	this.showContentOf = function(data_elmt)
	{
		this_out.infos_div_title.textContent = data_elmt.getTitleWithDate();
		this_out.infos_div_texte.textContent = data_elmt.getText();
		this_out.infos_div_texte.scrollTop = 0;
		for (var i = 0; i < this_out.data.length; i++) {
			this_out.data[i].disableDot();
		}
	    data_elmt.enableDot();
		this_out.oldCloserView =this_out.closerView;
	    this_out.closerView = data_elmt;

		this.scrolled();
	}

	this.scrollingAutoTimer = null;
	this.oldCloserView = null;
	this.forceView = null;
	this.scrollAuto = function(force)
	{ 
		if(force == true) 
		{
			this.forcedView = this.closerView;
		}

	    this.scrollingAutoTimer = null;
		/*console.log("a");*/
		if( (this.closerView != null || this.forcedView != null))
		{  
			//var offsetView = this.frise.scrollTop + $(this.frise).height()/2 ; 
			var offsetView = this.frise.scrollTop +70;

	        if( this.forcedView != null)
	        	var ecart = (this.forcedView.div().offsetTop+this.forcedView.div().offsetHeight/2) - offsetView;
	        else
	        	var ecart = (this.closerView.div().offsetTop+this.closerView.div().offsetHeight/2) - offsetView;
	        
	        /*console.log(ecart);*/
	        if(Math.abs(ecart) > 250)
	        {
		        this.frise.scrollTop+= ecart*0.05;
		        this.scrollingAutoTimer = setTimeout(
				function(){ 
					this_out.scrollAuto();
				}, 
				1);
		    }
	        else if(Math.abs(ecart) > 5)
	        {
		        this.frise.scrollTop+= 4*Math.sign(ecart);
		        this.scrollingAutoTimer = setTimeout(
				function(){ 
					this_out.scrollAuto();
				}, 
				1);
	        }
	        else
	        {
	        	if( this.forcedView != null)
	        	{
		        	this.frise.scrollTop += ecart;
		        	if(this.oldCloserView != this.forcedView)
		        	{
						this.showContentOf(this.forcedView);
					}
					this.oldCloserView = this.forcedView;
					//this.closerView = null;
	        	}
	        	else
	        	{
		        	this.frise.scrollTop += ecart;
		        	if(this.oldCloserView != this.closerView)
		        	{
						this.showContentOf(this.closerView);
					}
					this.oldCloserView = this.closerView;
					//this.closerView = null;
				}
	        }
		}
	}

	this.centerViewOnCloser = function(view)
	{ 
		if(typeof view != "undefined") this.closerView =view; 
		/*console.log("b");*/
		/*console.log(this.closerView);*/

		if(this.scrollingAutoTimer != null) return;
		this.scrollingAutoTimer = setTimeout(
			function(){ 
				this_out.scrollAuto(true);
			}, 
			20);
	} 


	 

	this.isBreakpoint = function( alias ) {
	    return $('.device-' + alias).is(':visible');
	}


	this.updateView = function () {   
		this_out.resizeForDesktop(); 
		this_out.centerViewOnCloser();  
	} 


	this.resizeForDesktop = function()
	{   
 		//general
		var height = "innerHeight" in window 
               ? window.innerHeight
               : document.documentElement.offsetHeight; 
        this_out.div_timeline.style.height = 0.7*height+"px"; 
	}

	//this.adaptTimelineSize();


	this.setData(data);
 

	$(window).resize(
		function()
		{ 
			this_out.updateView();
	    }
	);

	$(this.infos_div_texte).scroll( this.scrolled );
	
 	this.updateView(); 
 
 	if(this.data.length > 0)
 	{
 		this.closerView = this.data[0];
 		this.scrollAuto(true);
 	}
}
