<script type="text/javascript" language="JavaScript">;
<!--
// Use Freely as long as following disclaimer is intact ::
//----------------------------------------------------------
// Popup Calendar + Date Picker v1.4 18th January 2005
// This script written by Rik Comery. http://ricom.co.uk
// For support, visit the "Resources" section at http://ricom.co.uk
// All rights reserved.

weekBegin = 0;                      // First day of week. (0 = Sunday, 1 = Monday etc)
scrollingMonth = 1;                 // Allow user to scroll through months.  0=no, 1=yes
outerBorder = "#A60000";            // Colour of outer border.  For no border, enter "0"
dividerLine = "#FFFFFF";            // Colour of lines dividing Day Labels and Weekends

clickDate = 1                       // Allow users to click dates. 0=no, 1=yes
todayHighlight = 1                  // Highlight today's date. 0=no, 1=yes
popStatus = 1                       // Set calander as always visible, or popup.  0=always visible, 1=popup
dateBox = 1                         // Include a text box next to the calendar.  0=no, 1=yes

monthBackground = "#FFBF00";        // Background colour of month strap
monthColor = "#A60000";             // Text colour of Month title
monthFace = "arial, sans-serif";    // Font of Month title
monthSize = "10pt";                 // Font size of Month title
monthWeight = "bold";               // Weight of Month title. (bold or normal)
plusSymbol = ">";                   // Symbol to forward month.  You may also us images. e.g. plusSymbol = "<img src='plus.gif' />";
minusSymbol = "<";                  // Symbol to reverse month.  You may also us images. e.g. minusSymbol = "<img src='minus.gif' />";

dayBackground = "#A60000";          // Background colour  of day labels
dayColor = "#FFFFFF";               // Text colour of day labels
dayFace = "arial, sans-serif";      // Font of day labels
daySize = "8pt"                     // Font size of day labels
dayWeight = "bold";                 // Weight of day labels. (bold or normal)

dateBackground = "#D8D8D8";         // Background colour of full date cells
dateBackgroundH = "#A76565";        // Background colour of full date cells on Mouseover
dateFace = "arial,sans-serif";      // Font of dates
dateSize = "8pt";                   // Font size of dates
dateColor = "#000000";              // Text colour of dates
dateColorH = "#FFFFFF";             // Text colour of dates on Mouseover

weekendBackground = "#C0C0C0";      // Background colour of full date cells
weekendFace = "arial,sans-serif";   // Font of weekend dates
weekendSize = "8pt";                // Font size of weekend  dates
weekendColor = "#000000";           // Text colour of weekend  dates

offBackground = "#FFFFFF";          // Background colour of full date cells
offFace = "arial,sans-serif";       // Font of weekend dates
offSize = "8pt";                    // Font size of weekend  dates
offColor = "#C0C0C0";               // Text colour of weekend  dates

restrictColor = "#767676";          // Text colour of weekend  dates

todayBorder = "#A60000";            // Border colour to highlight today's date. Use "0" for no border. todayHighlight must be set to 1.
todayBackground = "#A60000";        // Background colour of today's date. todayHighlight must be set to 1.
todayFace = "arial,sans-serif";     // Font of today's date. todayHighlight must be set to 1.
todaySize = "8pt";                  // Font size of today's date. todayHighlight must be set to 1.
todayColor = "#FFFFFF";             // Text colour of today's date. todayHighlight must be set to 1.
todayWeight = "bold";               // Weight of today's date. (bold or normal). todayHighlight must be set to 1.

dateFormat = "MM/DD/YYYY";       // Format date will appear in text box. (MUST BE IN UPPERCASE) 
                                    // DD = date 
                                    // MM = month in figures. eg 12 for December
                                    // MMM = Short Month. eg Dec
                                    // MMMM = Long Month. eg. December
                                    // YY = Short Year. eg. 04
                                    // YYYY = Long Year. eg. 2004
                                    
                                    // Other examples are:
                                    // DD - MMM - YYYY (25 - Dec - 2004)
                                    // YYYY-MM-DD (2004-12-25)
                                    // MMMM DD, YYYY (December 25, 2004)
                                    
limitations = "0"                   // 0 = no limitations
                                    // 1 = Can only select days after today
                                    // 2 = Can only select days before today
                                    // 3 = Cannot select today
                                    // 4 = Can only select today
                                    // 5 = Can only select week days
                                    // 6 = Can only select weekends
                                    // enter the first two letters of a date to prohibit that day being clicked.
                                    // e.g.  "tu" will not allow a user to click any tuesdays                               

// Month + Day Labels ======================================================================================================================
// Change the months and day labels as appropriate.  Ensure they remain within quotes.
var rcMonths=["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var rcShortMonths=["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
var rcDays=["S","M","T","W","T","F","S"]

// End Configuration. Do Not Edit Below This Line ==========================================================================================
var restrict="";
var item=0;

//Browser Sniffer
if(navigator.appName.indexOf("Microsoft")>-1){browser="ie";}
if(navigator.appName.indexOf("Microsoft")>-1&&navigator.userAgent.indexOf("Opera")>-1){browser="opera";}
if(navigator.appName.indexOf("Netscape")>-1&&navigator.userAgent.indexOf("Netscape")<0){browser="moz";}
if(navigator.appName.indexOf("Netscape")>-1&&navigator.vendor.indexOf("Firefox")>-1){browser="firefox";}
if(navigator.appName.indexOf("Netscape")>-1&&navigator.vendorSub>6){browser="ns6";}

if(browser=="ie") var obj = "document.all";
else if(browser=="ns4") var obj = "document.layers";
else var obj = "document.getElementById";

rcStyles='<style type="text/css">';
rcStyles+='.monthhead{background-color:'+monthBackground+';font-family:'+monthFace+';color:'+monthColor+';font-size:'+monthSize+';font-weight:'+dayWeight+';text-decoration:none}';
rcStyles+='.daylabel{border-top:1px solid '+dividerLine+';border-bottom:1px solid '+dividerLine+';background-color:'+dayBackground+';font-family:'+dayFace+';color:'+dayColor+';font-size:'+daySize+';font-weight:'+monthWeight+';text-decoration:none;text-align:center}';
rcStyles+='.datecell{';if(clickDate==1){rcStyles+='cursor:hand;';}rcStyles+='background-color:'+dateBackground+';font-family:'+dateFace+';color:'+dateColor+';font-size:'+dateSize+';text-decoration:none;text-align:center}';
rcStyles+='.datecellhover{';if(clickDate==1){rcStyles+='cursor:hand;';}rcStyles+='background-color:'+dateBackgroundH+';font-family:'+dateFace+';color:'+dateColorH+';font-size:'+dateSize+';text-decoration:none;text-align:center}';
rcStyles+='.todaycell{padding:2px;';if(clickDate==1){rcStyles+='cursor:hand;';}rcStyles+='';if(todayBorder!=0){rcStyles+='border:1px solid '+todayBorder+';';}rcStyles+='background-color:'+todayBackground+';font-family:'+todayFace+';color:'+todayColor+';font-size:'+todaySize+';font-weight:'+todayWeight+';text-decoration:none;text-align:center}';
rcStyles+='.weekendcell{';if(clickDate==1){rcStyles+='cursor:hand;';}rcStyles+='background-color:'+weekendBackground+';font-family:'+weekendFace+';color:'+weekendColor+';font-size:'+weekendSize+';text-decoration:none;text-align:center}';
rcStyles+='.weekendcell{';if(clickDate==1){rcStyles+='cursor:hand;';}rcStyles+='background-color:'+weekendBackground+';font-family:'+weekendFace+';color:'+weekendColor+';font-size:'+weekendSize+';text-decoration:none;text-align:center}';
rcStyles+='.outercell{';if(clickDate==1){rcStyles+='cursor:default;';}rcStyles+='background-color:'+offBackground+';font-family:'+offFace+';color:'+offColor+';font-size:'+offSize+';text-decoration:none;text-align:center}';
rcStyles+='.close{font-family:'+dateFace+'; font-size:'+dateSize+'; color:'+dateColor+'; cursor:hand;text-decoration:none}';
rcStyles+='<\/style>';
document.writeln(rcStyles)

function doRCCalendar(){
item++;
  setCal='<table border="0" cellpadding="0" cellspacing="0"><tr><td>';
  setCal+='<div z-index="999" id="calendarDateDiv'+item+'">';
  setCal+='<table border="0" cellpadding="0" cellspacing="0"><tr><td nowrap="nowrap"><p>';
  if(dateBox==1){setCal+='<input type="text" id="calendarDate'+item+'" name="calendarDate'+item+'">';}else{setCal+='&nbsp;';}
  if(popStatus>0){
    setCal+='&nbsp;<a href="javascript:void(0)" onClick="showCalendar(\'\','+item+')"><img src="include/interface1/images/calicon.png" border="0"  alt="Calendar Popup" /><\/a>';
  }
  setCal+='</p><\/td><\/tr><\/table>';
  setCal+='<\/div>';
  visible=(popStatus>0)?"hidden":"visible";
  setCal+='<div z-index="1000" id="calendarBox'+item+'" name="calendarBox'+item+'" style="visibility:'+visible+'; position:absolute;left:0px;top:0px"><\/div>';
  setCal+='</td></tr></table>';
  document.writeln(setCal);
  getRCCalendar('','',item); 
}

function showCalendar(when,item){
  closeCalendar()
  if(when==""||when==null){
    var dateBoxObj = eval(obj+'("calendarBox'+item+'")')
    var dateDivObj = eval(obj+'("calendarDateDiv'+item+'")')
    getOffset(dateDivObj,'top')
    getOffset(dateDivObj,'left')
    getOffset(dateDivObj,'width')
    
    dateBoxObj.style.left=oLeft+oWidth+10;    
    dateBoxObj.style.top=oTop;
    dateBoxObj.style.visibility = "visible"
  }else{
    if(popStatus==0){
      showCalendar('',item);
    }
  }  
}
 
function getRCCalendar(year,month,item){
  now=new Date() 
  if(year==null||year==""||month==""||month==null){year=yearCorrect(now.getYear());month=now.getMonth()}
  if(month>11){month=0;year++}
  if(month<0){month=11;year--}
  
  var showMonth = new Date(year,month,1);
  showMonth.setDate(1)
  var firstDay = new Date(showMonth);
  firstDay.setDate(1-(7+firstDay.getDay()-weekBegin)%7);

  doCalc='<table border="0" cellpadding="0" cellspacing="0"><tr><td colspan="2">';
  doCalc+='<table border="0" cellpadding="3" cellspacing="0"';if(outerBorder!="0"){doCalc+='style="border:1px solid '+outerBorder+'"';}doCalc+='>';
  doCalc+='<tr>';
  doCalc+='<td colspan="7" class="monthhead"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr>';
  if(scrollingMonth==1){doCalc+='<td><a class="monthhead" href="javascript:void(0)" onClick="getRCCalendar('+year+','+(month-1)+','+item+')">'+minusSymbol+'<\/a><\/td>';}
  doCalc+='<td align="center" class="monthhead">'+rcMonths[showMonth.getMonth()]+" "+year+'<\/td>';
  if(scrollingMonth==1){doCalc+='<td align="right"><a class="monthhead" href="javascript:void(0)" onClick="getRCCalendar('+year+','+(month+1)+','+item+')">'+plusSymbol+'<\/a><\/td>';} 
  doCalc+='<\/tr><\/table><\/td><\/tr>';
  doCalc+='<\/tr>';
  for(x=0;x<7;x++){
    doCalc+='<td class="daylabel"';
    if(x<6){doCalc+='style="border-right:1px solid #FFFFFF"';}
    doCalc+='>'+rcDays[(weekBegin+x)%7]+'<\/td>';
  }
  doCalc+='<\/tr>';
    var today = new Date(firstDay);
    while (today.getMonth() == showMonth.getMonth() || today.getMonth() == firstDay.getMonth()) {
    	 doCalc+='<tr>';
    	 for (var y=0; y<7; y++) {               
        if (todayHighlight==1&&now.getDate()==today.getDate()&&today.getMonth()==now.getMonth()&&yearCorrect(today.getYear())==yearCorrect(now.getYear())){newClass="todaycell"; cellType="today"}
        else if (today.getMonth()==month&&(today.getDay() == 0 || today.getDay() == 6)) {newClass="weekendcell"; cellType="weekend"}  
        else if (today.getMonth() != month) {newClass="outercell"; cellType="outerMonth"}     
        else{newClass="datecell";cellType="weekday"}
        
        daysDifference=Math.ceil((today.getTime()-now.getTime())/(1000*60*60*24))
        if(limitations==1&&daysDifference<0){restrict=true}
        else if(limitations==2&daysDifference>0){restrict=true}
        else if(limitations==3&daysDifference==0){restrict=true}
        else if(limitations==4&daysDifference!=0){restrict=true}
        else if(limitations==5&&newClass=="weekendcell"){restrict=true}
        else if(limitations==6&&(newClass=="datecell"||newClass=="todaycell")){restrict=true}
        else if(limitations=="su"&&y==0){restrict=true}
        else if(limitations=="mo"&&y==1){restrict=true}
        else if(limitations=="tu"&&y==2){restrict=true}
        else if(limitations=="we"&&y==3){restrict=true}
        else if(limitations=="th"&&y==4){restrict=true}
        else if(limitations=="fr"&&y==5){restrict=true}
        else if(limitations=="sa"&&y==6){restrict=true}
        else{restrict=false}
        
        doCalc+='<td align="center" class="'+newClass+'"';
        doCalc+='style="';
        if(cellType!="outerMonth"&&(today.getDay()==5||(today.getDay()==0&&weekBegin!=1))){doCalc+='border-right:1px solid '+dividerLine+';';}        
        if(restrict==true){doCalc+='color:'+restrictColor+';cursor:default;';}
        doCalc+='"';
        
        if(clickDate==1&&today.getMonth() == month&&restrict==false){doCalc+='onClick="if(dateBox>0){showDate(\''+today.getDate()+'\',\''+today.getMonth()+'\',\''+yearCorrect(today.getYear())+'\','+item+')}" onMouseOver="highlight(this,\'over\',\''+cellType+'\');"  onMouseOut="highlight(this,\'out\',\''+cellType+'\');"';}
        doCalc+='>'+today.getDate()+'</td>';       
    		  today.setDate(today.getDate()+1);
    	 } 
      doCalc+='<\/tr>'; 
    } 
  doCalc+='<\/table><\/td><\/tr><tr>';
  if(popStatus==1){doCalc+='<td width="50%"><a class="close" href="javascript:void(0)" onClick="closeCalendar('+item+')">Close</a><\/td>';}
  if(dateBox==1){doCalc+='<td width="50%" align="right"><a class="close" href="javascript:void(0)" onClick="clearForm('+item+')">Clear Form</a><\/td>';}
  doCalc+='<\/table>';
  eval(obj+'("calendarBox'+item+'").innerHTML = doCalc')
}
    
function clearForm(item){
  document.getElementById("calendarDate"+item).value="";
}

function yearCorrect(year){
  if (year < 1000) {year += 1900}
  return year;
}

function closeCalendar(closeItem){
  if(closeItem==""||closeItem==null){
    for(x=1;x<item+1;x++){
      document.getElementById("calendarBox"+x).style.visibility="hidden"
    }
  }else{
    document.getElementById("calendarBox"+closeItem).style.visibility="hidden"
  }
}
                                 
function showDate(day,month,year,item){
  if(dateFormat.indexOf("MMM")<0){month++;}
  
  day=makeString(day)
  if(dateFormat.indexOf("MM")>-1&&dateFormat.indexOf("MMM")<0){month=makeString(month)}
  if(dateFormat.indexOf("MMMM")>-1){month=rcMonths[month]}
  if(dateFormat.indexOf("MMM")>-1&&dateFormat.indexOf("MMMM")<0){month=rcShortMonths[month]}
  year = (dateFormat.indexOf("YYYY")>-1)?year:year.substring(2,4);
  
  newDateFormat=dateFormat.replace(/DD/g,day).replace(/MMMM/g,month).replace(/MMM/g,month).replace(/MM/g,month).replace(/YYYY/g,year).replace(/YY/g,year)
  document.getElementById("calendarDate"+item).value=newDateFormat;
  closeCalendar()
}

function makeString(value){
  return ((value<10)?"0":"")+value
}

function highlight(obj, state, cellType){
  newClass=(state=="over")?"datecellhover":(cellType=="weekday")?"datecell":(cellType=="today")?"todaycell":"weekendcell"
  obj.className=newClass
}

// Find positioning for calendar
function getOffset(obj, dim) {
  if(dim=="left"){     
    oLeft = obj.offsetLeft; 
    while(obj.offsetParent!=null) {    
      oParent = obj.offsetParent     
      oLeft += oParent.offsetLeft 
      obj = oParent 	
    }
    return oLeft
  } else if(dim=="top"){
    oTop = obj.offsetTop;
    while(obj.offsetParent!=null) {
      oParent = obj.offsetParent
      oTop += oParent.offsetTop
      obj = oParent 	
    }
    return oTop
  }else if(dim=="width"){
    oWidth = obj.offsetWidth
    return oWidth
  }else if(dim=="height") {
    oHeight = obj.offsetHeight
    return oHeight
  }else {
    alert("Error: invalid offset dimension '" + dim + "' in getOffset()")
    return false;
  }
}
//-->
</script>
            
            