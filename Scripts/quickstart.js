var xmlHttp=createXMLHttp();
function createXMLHttp(){
	if (typeof XMLHttpRequest!="undefined"){
		return new XMLHttpRequest();
	} else if (window.ActiveXObject){
		var aVersions=["MSXML2.XMLHttp.5.0", "MSXML2.XMLHttp.4.0", "MSXML2.XMLHttp.3.0", "MSXML2.XMLHttp", "Microsoft.XMLHttp"];
		for (var i=0;i<aVersions.length;i++){
			try{
				var oXmlHttp=new ActiveXObject(aVersions[i]);
				return oXmlHttp;}
			catch(oError){}
		}
		throw new Error("Невозможно создать объект XMLHttp!");
	}
}
function process()
{
	if(xmlHttp.readyState=4 || хmlHttp.readyState==0)
	{
		var oForm=document.forms[0];
		var sBody=getRequestBody(oForm);
		xmlHttp.open("GET","cgi/giveuser.pl?name="+sBody,true);
		xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState==4)
			{
				if(xmlHttp.status==200)
				{
					хmlResponse=xmlHttp.responseText;
					setTimeout('process()', 500);
				}
				else
				{
					alert("Server requesting problem: "+xmlHttp.statusText);
				}
			}
		};
		xmlHttp.send(sBody);
	}
	else
	{
		setTimeout('process()', 500);
	}
}



function getRequestBody(oForm){
	name=encodeURIComponent(document.getElementById("myName").value);
	param=name;
	return param;
}

function saveResult(sText){
	var sElem=document.getElementById("divMessage");
	sElem.innerHTML=sText;
	}
function sendRequest2(){
	var oXmlHttp=createXMLHttp();
	var oForm=document.forms[0];
	var sBody=getRequestBody(oForm);
	oXmlHttp.open("GET","getuser1.php?name="+sBody,true);
	oXmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	oXmlHttp.onreadystatechange=function(){
		if (oXmlHttp.readyState==4){
			saveResult(oXmlHttp.responseText);
			if (oXmlHttp.status==200){
				} else {saveResult("Error"+oXmlHttp.statusText);}
			}
		};
	oXmlHttp.send(sBody);
	}