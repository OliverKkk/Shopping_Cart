function startclock()
{
  var thetime=new Date();
  var nhours=thetime.getHours();
  var nmins=thetime.getMinutes();
  var nsecn=thetime.getSeconds();
  var nday=thetime.getDay();
  var nmonth=thetime.getMonth();
  var ntoday=thetime.getDate();
  var nyear=thetime.getYear();
  var AorP = (nhours >= 12) ? "P.M." : "A.M.";
  if (nhours>=13)
    nhours-=12;
  if (nhours<1)
   nhours=12;	
  if (nsecn<10)
   nsecn="0"+nsecn;
  if (nmins<10)
   nmins="0"+nmins;
  switch (nday) {
    case 0 : nday = "Sunday"; break;
    case 1 : nday = "Monday"; break;
    case 2 : nday = "Tuesday"; break;
    case 3 : nday = "Wednesday"; break;
    case 4 : nday = "Thursday"; break;
    case 5 : nday = "Friday"; break;
    case 6 : nday = "Saturday"; break;
  }
  switch (nmonth) {
	case 0 : nmonth = "January"; break;
	case 1 : nmonth = "February"; break;
	case 2 : nmonth = "March"; break;
	case 3 : nmonth = "April"; break;
	case 4 : nmonth = "May"; break;
	case 5 : nmonth = "June"; break;
	case 6 : nmonth = "July"; break;
	case 7 : nmonth = "August"; break;
	case 8 : nmonth = "September"; break;
	case 9 : nmonth = "October"; break;
	case 10 : nmonth = "November"; break;
	case 11 : nmonth = "December"; break;
  }
  if (nyear<=99)
    nyear= "19"+nyear;
  if ((nyear>99) && (nyear<2000))
   nyear+=1900;

  var clock_span = document.getElementById("clock");
  clock_span.innerHTML = nday+", "+nmonth+" "+ntoday+", "+nyear+" "+nhours+":"+nmins+":"+nsecn+" "+AorP;

setTimeout('startclock()',1000);
}

if (document.getElementById && document.createTextNode) {
  startclock();
}


