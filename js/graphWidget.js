

 //var arbre = $(".arbre");
 //arbre.text(arbre.data("file"));

//***** Liste chainée ****//

function Noeud(texte, id, parent,css_classe,color) { 
	this.parent = parent;
	this.id = id;
	this.successeurs = new Array();
	this.div = document.createElement("div"); 
	this.div.style.display = "none";  
	this.div.style.position = "absolute";
  	this.title = texte.match("\[[0-9a-zA-Z ?éçôàè€/\(\).,:!-]*\]")[0];
	this.texte = texte.replace(this.title,"");
  	this.title=this.title.replace("\[","");
  	this.title=this.title.replace("\]","");
	this.div.innerHTML = 
	'<div>' 
	+'<div style="margin: auto;padding: 10%;">'
    +'<div style="margin:auto; #position: relative; #top: -50%">'
    + this.title
  	+'  </div>'
  	+'</div>'
  	+'</div>'
  	; ~~
  	/*this.div.style.border = "1px solid black";*/ 
	$(this.div).children()[0].classList.add(css_classe);

	this.setColor = function(color)
	{ 
		/*$(this.div).children(".arbre_elmt")[0].style.background = "transparent radial-gradient(white, "+color+") repeat scroll 0% 0%"; */
		$(this.div).children(".arbre_elmt")[0].style.background = "transparent radial-gradient(white 1%, "+color+" ) repeat scroll 0% 0%"; 
	}

	this.setColor(color);

  	if(this.texte.replace(" ","").length==0)
  	{
  		this.texte = ""; 
  	}

	this.ajoutSuccesseur = function (Noeud) {
		this.successeurs.push(Noeud);
		Noeud.setParent(this);
	}

	this.setParent = function (parent) {
		this.parent = parent;
	} 

	this.getParent = function () {
		return this.parent;
	} 
 
	this.getDiv = function () {
		return this.div;
	} 
 
	this.display = function () {
	this.div.style.display = "table";
	} 

	this.hide = function () {
	this.div.style.display = "none";
	} 

	var duration = 0;//300;
	this.setSize= function (height,width)
	{ 
		$(this.div).animate({ 
	        width: width,
	        height: height
	      }, duration );
	}

	this.setPosition= function (top,left)
	{ 
		$(this.div).animate({ 
	        left: left,
	        top: top
	      }, duration );
	}

	this.moveAndResize = function(top,left,width,height)
	{
		$(this.div).animate({ 
	        width: width,
	        height: height,
	        left: left,
	        top: top
	      }, duration );

	}

	this.getSuccesseur = function(index)
	{
		if(index < this.successeurs.length) return this.successeurs[index];

		return null;
	}

	this.getSuccesseurNb = function ()
	{
		return this.successeurs.length;
	}

	this.setZIndex = function (zIndex)
	{
		this.div.style.zIndex=zIndex;
	}

	this.getZIndex = function ()
	{
		return this.div.style.zIndex;
	}

	this.getPositionTop =function()
	{
		return this.div.style.top;
	}

	this.getPositionLeft =function()
	{
		return this.div.style.left;
	}

	this.getWidth =function()
	{
		return this.div.style.width;
	}

	this.getHeight =function()
	{
		return this.div.style.height;
	}

	this.setOnClick = function(function_in)
	{
		var this_in =this;
		$(this.div).children()[0].onclick = function(){   
			function_in(this_in);
		};
	}

	this.getText = function()
	{
		return '<h3>'+this.title+'</h3>'+'<hr id="popup-sep">'
				+'<div>'+this.texte+'</div>';
	}
   			/*console.log("init");*/
   	this.showInfosFct = null;

   	this.setShowInfosFct = function(fct)
   	{
   		var this_in = this;
   		this.showInfosFct = function()
   		{
   			fct(this_in.getText());
   		}
   	}
}

function buildArbre(data,css_classe,div)
{

	var noeuds=data.match(/\[[ ]*[0-9]+[ ]*,[ ]*#[0-9A-F]{6}[ ]*,[ ]*"[0-9a-zA-Z?\[\] éçàèô\%<>î\»\«€//\(\).,:!ê\’\'\"-]*"[ ]*\]/g); 
		var liens=data.match(/\{[ ]*[0-9]+[ ]*=>[ ]*[0-9]+[ ]*\}/g);  
		var r =  data.match(/root[ ]*:[ ]*[0-9]+/);
		r=r[0]; 
		var listeNoeuds = new Array();
		var new_noeud; 
		var popup =document.createElement("div"); 
		popup.style.position = "absolute"; 
		popup.classList.add("popup");
		var textPopup = document.createElement("div");
		var btn_close_popup = document.createElement("img");
		btn_close_popup.src = "img/graph_close.svg";
		btn_close_popup.alt = "close";
		btn_close_popup.id = "close-popup";
		btn_close_popup.textContent = "close";
		btn_close_popup.onclick = function()
		{
	   				/*console.log("fed");*/
			div.removeChild(popup);
		} 
		popup.appendChild(textPopup);
		popup.appendChild(btn_close_popup);
				
		for (var i = 0; i < noeuds.length; i++) {
			var nb = noeuds[i].match(/\[[ ]*[0-9]+[ ]*,/);
			nb=nb[0];
			nb=parseInt(nb.replace(/\[|,/g,""));
			var color = noeuds[i].match(/,[ ]*#[0-9A-F]{6}[ ]*,/)[0].replace(/ /g,"").replace(/,/g,"");
			console.log(color);
			var texte = noeuds[i].match(/,[ ]*"[0-9a-zA-Z?\[\] éçà\»\«è\%î<>ô€//\(\).,:!ê\’\'\"-]*"[ ]*\]/);
			texte=texte[0];
			texte=texte.substring(texte.indexOf("\"")+1,texte.lastIndexOf("\"")); 
			new_noeud=new Noeud(texte,nb,null,css_classe,color);
			listeNoeuds.push(new_noeud);
			new_noeud.setShowInfosFct(function(texte){  
				textPopup.innerHTML= texte;
				div.appendChild(popup);
				popup.style.display = "none";
				$(popup).fadeIn(  );
			});
		}

		for (var i = 0; i < liens.length; i++) {

			var parent = liens[i].match(/\{[ ]*[0-9]+/);
			parent=parent[0];
			parent=parseInt(parent.replace(/\{/g,""));

			var child = liens[i].match(/[0-9]+[ ]*\}/);
			child=child[0];
			child=parseInt(child.replace(/\}/g,""));

			var Noeud_p=null, Noeud_c = null;

			for (var j = 0; j < listeNoeuds.length; j++) {
				if(Noeud_p == null && listeNoeuds[j].id == parent)
				{
					Noeud_p = listeNoeuds[j];
				}
				else if(Noeud_c == null && listeNoeuds[j].id == child)
				{
					Noeud_c = listeNoeuds[j];
				}

				if(Noeud_c !=null && Noeud_p != null)
				{
					Noeud_p.ajoutSuccesseur(Noeud_c);
					break;

				}
			}
		} 

		var id_root =parseInt(r.match(/[0-9]+/));
		for (var i = 0; i < listeNoeuds.length; i++) {
			if(listeNoeuds[i].id == id_root)
			{  
				return listeNoeuds[i] ;
			}
		}

		return null;
}

 

function fillDiv(div,centre)
{ 
	var height = div.offsetHeight;
	var width = div.offsetWidth;
	var x = 0;
	var y = 0;
 
	var noeud = null;
	var z_index = centre.getSuccesseurNb() ;
	var href = Math.min(height*0.25,width*0.4);

	$(div).empty();

	//element principal
    noeud = centre;
	y = height*0.5-href*0.5; x = width*0.5-href*0.5;
	div.appendChild(noeud.getDiv());
	noeud.display(); 
	noeud.moveAndResize(y+"px",x+"px",href+"px",href+"px");   
	noeud.setOnClick(
		function(n)
		{
			if(n.getParent()!= null) fillDiv(div,n.getParent());
		}
		);

	//sous elements 
	var theta = 0;
	var pas_theta = 2*Math.PI/centre.getSuccesseurNb();
	var h_tmp =href/centre.getSuccesseurNb();
	for (var i = 0; i < centre.getSuccesseurNb(); i++) {
		noeud = centre.getSuccesseur(i); 
		div.appendChild(noeud.getDiv());
		noeud.display();
		noeud.moveAndResize(
			(y+height*0.3*Math.cos(theta))+"px",
			(x+width*0.3*Math.sin(theta))+"px",
			href+"px",href+"px"
			); 
		noeud.setOnClick(
		function(n)
		{
			if(n.getSuccesseurNb()>0)
			{
				fillDiv(div,n);
			}
			else
			{
				n.showInfosFct();
			}
		}
		);
		theta += pas_theta;
		if(theta <= Math.PI) z_index--; else z_index++;
	}
 
}

function turnArbre(centre,nb)
{
	var tops = new Array();
	var lefts = new Array();
	var widths = new Array();
	var heights = new Array();
	var zIs = new Array();

	for (var i = 0; i < centre.getSuccesseurNb(); i++) {
		var noeud = centre.getSuccesseur(i);   
		tops.push(noeud.getPositionTop());
		lefts.push(noeud.getPositionLeft());
		widths.push(noeud.getWidth());
		heights.push(noeud.getHeight()); 
	}

	if(nb < 0) nb += centre.getSuccesseurNb();
	for (var i = 0; i < centre.getSuccesseurNb(); i++) {
		var noeud = centre.getSuccesseur(i);   
		j = (i+nb)%centre.getSuccesseurNb(); 
		noeud.moveAndResize(tops[j],lefts[j],heights[j],widths[j]); 
	}

}


function ArbreData(id_div,racine_arbre,centre) {
	this.id_div = id_div;
	this.racine_arbre =racine_arbre;
	this.centre = centre;
}

//init  
function createArbre(id_div,data,css_classe)
{ 
	var arbre = $("#"+id_div);
	if(arbre.length != 1) {
		console.log("bad number of elements with id "+id_div+" : "+arbre.length+" (should be 1)");
		return;
	}
	arbre = arbre[0];
	arbre.textContent = "";

	var racine_arbre = buildArbre(data,css_classe,arbre);
/*
	new ResizeSensor(arbre, function() {
	    //fillDiv(arbre,racine_arbre); 

	});
	*/
	fillDiv(arbre,racine_arbre); 


}

 
function adaptTimelineSize()
{
		var height = "innerHeight" in window 
               ? window.innerHeight
               : document.documentElement.offsetHeight; 
        /*console.log(height);*/

		$("#arbre")[0].style.height = (height*0.7)+"px";
}

$(window).resize(
	function()
	{  
		adaptTimelineSize();
    }
);

adaptTimelineSize();
