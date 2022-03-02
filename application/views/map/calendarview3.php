<!DOCTYPE html>
<html>
<head>
    <title id="track">Calendar View </title>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<script type = 'text/javascript' src = "<?php echo base_url(); ?>js/jquery-1.10.2.js"></script>
	<script type = 'text/javascript' src = "<?php echo base_url(); ?>js/jquery-ui.custom.min.js"></script>
	<script type = 'text/javascript' src = "<?php echo base_url(); ?>js/fullcalendar.js"></script>
    <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>css/fullcalendar.css"  />
    <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>css/fullcalendar.print.css" media='print'/>
    <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>css/styles.css"  id="css1" disabled id="cssfortimeslot"/>
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
<style>

	body {
		margin: 0px 0px 0px 0px;
		text-align: center;
		background-color: #DDDDDD;
		}

	#wrap {
		width: 1100px;
		margin: 0 auto;
		}

	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		text-align: left;
		}

	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
		}

	.external-event { /* try to mimick the look of a real event */
		margin: 10px 0;
		padding: 2px 4px;
		background: #3366CC;
		color: #fff;
		font-size: .85em;
		cursor: pointer;
		}

	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
		}

	#external-events p input {
		margin: 0;
		vertical-align: middle;
		}

	#calendar {
/* 		float: right; */
        margin: 0 auto;
		width: 1200px;
		background-color: #FFFFFF;
		  border-radius: 6px;
        box-shadow: 0 1px 2px #C3C3C3;
		}

	.timeslotview {
	display: none; /* Hidden by default */
	position: fixed; /* Stay in place */
	width: 100%; /* Full width */
	height: 100%; /* Full height */
	overflow: auto; /* Enable scroll if needed */
	background-color: rgb(0,0,0); /* Fallback color */
	background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Timeslotview Content */
	.timeslotview-content {
	position: relative;
	background-color: #fefefe;
	padding: 0;
	border: 1px solid #888;
	width: 100%;
	box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
	}



	/* The Close Button */
	.close {
	color: black;
	float: right;
	font-size: 28px;
	font-weight: bold;
	}

	#closewindow:hover,
	#closewindow:focus {
	color: #000;
	text-decoration: none;
	cursor: pointer;
	}

	.timeslotview-body {padding: 2px 16px;}
</style>
</head>
<body onload="loadcalendar('1037', '01', '2020', '12');">
<table id="calendardate" hidden>
	<thead>
		<th>Date</th>
	</thead>
	<tbody id="tbdcalendardate">
	</tbody>
</table>
<table id="calendartime" hidden>
	<thead>
		<th>Ads Time</th>
	</thead>
	<tbody id="tbdcalendartime">
	</tbody>
</table>
<table id="calendarads" hidden>
	<thead>
		<th>Ads Name</th>
	</thead>
	<tbody id="tbdcalendarads">
	</tbody>
</table>
<table id="calendarpercentage" hidden>
	<tbody id="tbdcalendarpercentage">
	</tbody>
</table>
<div id="hint" style="text-align:left; margin-left:0px;font-size:14px;
		font-family:'Helvetica Nueue',Arial,Verdana,sans-serif; display:inline-block; position:absolute; left:10px; top:10px;"> 
Timeslot available : <br>
<button type="button" style="background-color:#fa3838; padding:5px; font-size:12px; color:#f74e4b">ab</button> 0 - 20%<br>
<button type="button" style="background-color:#f77f08; padding:5px; font-size:12px; color:#f77f08">ab</button> 21 - 40%<br>
<button type="button" style="background-color:#f7f008; padding:5px; font-size:12px; color:#f7f008">ab</button> 41 - 60%<br>
<button type="button" style="background-color:#c1fa1d; padding:5px; font-size:12px; color:#c1fa1d">ab</button> 61 - 80%<br>
<button type="button" style="background-color:#BEFFBF; padding:5px; font-size:12px; color:#BEFFBF">ab</button> 81 - 100%<br>
</div>
<div id='wrap'>
<div id='calendar'>
</div>
<div style='clear:both'></div>
</div>
<div id="timeslotvw" class="timeslotview" style="display:none;text-align:left">
	<div class="timeslotview-content">
		<div class="timeslotview-body">
			<span id="closewindow" class="close" onclick="closewd()">&times;</span>
			<br>
                <div class="card-body">
				Timeslot available : 
				<button type="button" style="background-color:#fa3838; padding:5px; font-size:12px; color:#f74e4b; margin-left:10px">ab</button> 0 - 20%
				<button type="button" style="background-color:#f77f08; padding:5px; font-size:12px; color:#f77f08; margin-left:10px">ab</button> 21 - 40%
				<button type="button" style="background-color:#f7f008; padding:5px; font-size:12px; color:#f7f008; margin-left:10px">ab</button> 41 - 60%
				<button type="button" style="background-color:#c1fa1d; padding:5px; font-size:12px; color:#c1fa1d; margin-left:10px">ab</button> 61 - 80%
				<button type="button" style="background-color:#BEFFBF; padding:5px; font-size:12px; color:#BEFFBF; margin-left:10px">ab</button> 81 - 100%
				<br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="adstime" width="100%" cellspacing="0" style="font-weight:600">
                            <thead>
                                <tr>
                                    <th>Timeslot</th>
									<th>Details</th>
									<th>Ads List</th>
                                </tr>
                            </thead>
							<tbody id="adstbd">
							</tbody>
                        </table>
                    </div>
                </div>
		</div>
	</div>
</div>


</body>
</html>

<script>
function loadcalendar(signage_id, start_month, year, end_month)
{
	document.getElementById("calendar").innerHTML = "";
    $.ajax({
            type:'POST',
            url:'http://178.128.48.225:60/pricing_decision/schedule_info',
			data: {signage_id, start_month, year, end_month},
            dataType:'json',
            success:function(mydata){
                console.log(mydata);
				calculatecalendar(mydata);
				calculatepercentage(start_month,end_month,mydata);
				showcalendarcontent(signage_id, start_month, year, end_month);
            },
            error:function(err){
                console.log(err);
            }
        })
}

function findads(signage_id, start_month, year, end_month, chosendate)
{
    $.ajax({
            type:'POST',
            url:'http://178.128.48.225:60/pricing_decision/schedule_info',
			data: {signage_id, start_month, year, end_month},
            dataType:'json',
            success:function(mydata){
                console.log(mydata);
				calculatetimeslot(mydata, chosendate);
            },
            error:function(err){
                console.log(err);
            }
        })
}

function calculatecalendar(mydata)
{
	var i, ii, iii, iv, counter;
	var table1 = "";
	var table2 = "";
	var table3 = "";
	for(counter=0; counter<mydata.data.length; counter++)
	{
		table1 += "<tr>" + "<td>" + mydata.data[counter].start_date + "</td>" + "</tr>";
		for(ii=0; ii<mydata.data[counter].time.length; ii++)
		{
			table2 += "<tr>" + "<td>" + mydata.data[counter].start_date + mydata.data[counter].time[ii] + "</td>" + "</tr>";
		}
		for(iii=0; iii<mydata.data[counter].ad_name.length; iii++)
		{
			for(iv=0; iv<mydata.data[counter].time.length; iv++)
			{
				table3 += "<tr>" + "<td>" + mydata.data[counter].start_date + mydata.data[counter].time[iv] + mydata.data[counter].ad_name[iii] + "</td>" + "</tr>";
			}
		}
	}
	$("#calendardate tbody").append(table1);
	$("#calendartime tbody").append(table2);
	$("#calendarads tbody").append(table3);
}

function calculatepercentage(start_month,end_month,mydata)
{
    var table = document.getElementById("calendarpercentage");
    var row, cell1;
	var percentagetimeslot = "";
	var currentdate = "";
	var different_in_day, different_in_time;
	var date1, date2;
    var month1, month2;
    month1 = parseInt(start_month);
    month2 = parseInt(end_month);
    var different_in_month = month2 - month1;
    for(var diffinmonth=0; diffinmonth<=different_in_month; diffinmonth++)
    {
        var findday = new Date(2020, month1, 0).getDate();
        for(var counter=0; counter<findday; counter++)
        {
            if(counter<9 && month1<10)
            {
                currentdate = "2020-0" + month1 + "-0" + (counter+1);
            }
            else if(counter>=9 && month1<10)
            {
                currentdate = "2020-0" + month1 + "-" + (counter+1);
            }
            else if(counter<9 && month1>=10)
            {
                currentdate = "2020-" + month1 + "-0" + (counter+1);
            }
            else if(counter>=9 && month1>=10)
            {
                currentdate = "2020-" + month1 + "-" + (counter+1);
            }
            for(var i=0; i<mydata.data.length; i++)
            {
                if(currentdate == mydata.data[i].start_date)
                {
                    year = mydata.data[i].start_date.toString().slice(0,4);
                    month = mydata.data[i].start_date.toString().slice(5,7);
                    day = mydata.data[i].start_date.toString().slice(8,10);
                    date1 = mydata.data[i].start_date.toString().replace(/-/g, "/");
                    date2 = mydata.data[i].end_date.toString().replace(/-/g, "/");
                    date1 = new Date(date1);
                    date2 = new Date(date2);
                    different_in_time = date2.getTime() - date1.getTime();
                    different_in_day = different_in_time / (1000 * 3600 * 24);;
                    for(var diffinday=0; diffinday<=different_in_day; diffinday++)
                    {
                        temppercentage = 0;
                        tempdate = year + "-" + month + "-" + day;
                        temppercentage = 100 - ((mydata.data[i].time.length * mydata.data[i].ad_name.length) / 480 * 100);
                        temppercentage = temppercentage.toFixed(2);
                        //percentagetimeslot += "<tr><td>" + mydata.data[i].start_date + temppercentage + "</td></tr>";
                        percentagetimeslot = mydata.data[i].start_date + temppercentage;
                        row = table.insertRow(-1);
                        cell1 = row.insertCell(0);
                        cell1.innerHTML = percentagetimeslot;
                        day++;
                    }
                    //$("#calendarpercentage tbody").append(percentagetimeslot);
                }
            }
        }
        month1++;
    }
}

function calculatetimeslot(mydata, chosendate)
{
	var table = document.getElementById("adstime");
	var row, cell1, cell2, cell3, contentcell2, contentcell3, temptime, temptimeslot, tempdate;
	var percentageday = [], rangeofday = [];
	var percentagetimeslot, totalpercentagetimeslot = 0;
	var different_in_day, different_in_time;
	var date1, date2, year, month, day;
	var timeslot = ["00:00", "00:30", "01:00", "01:30", "02:00", "02:30", "03:00", "03:30","04:00", "04:30", 
	"05:00", "05:30", "06:00", "06:30", "07:00", "07:30", "08:00", "08:30", "09:00", "09:30", "10:00", "10:30",
	"11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30",
	"17:00", "17:30", "18:00", "18:30", "19:00", "19:30", "20:00", "20:30", "21:00", "21:30", "22:00", "22:30",
	"23:00", "23:30"];
	var slotavailable = [10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 
	10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10];
	var adsname = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", 
	"", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
	for(var i=0; i<mydata.data.length; i++)
	{
		year = mydata.data[i].start_date.toString().slice(0,4);
		month = mydata.data[i].start_date.toString().slice(5,7);
		day = mydata.data[i].start_date.toString().slice(8,10);
		date1 = mydata.data[i].start_date.toString().replace(/-/g, "/");
		date2 = mydata.data[i].end_date.toString().replace(/-/g, "/");
		date1 = new Date(date1);
		date2 = new Date(date2);
		different_in_time = date2.getTime() - date1.getTime();
		different_in_day = parseInt(different_in_time / (1000 * 3600 * 24));
		for(var diffinday=0; diffinday<=different_in_day; diffinday++)
		{
			tempdate = year + "-" + month + "-" + day;
			if(chosendate == tempdate)
			{
				for(var ii=0; ii<mydata.data[i].time.length; ii++)
				{
					for(var j=0; j<timeslot.length; j++)
					{
						temptime = mydata.data[i].time[ii].toString().slice(0,5);
						temptimeslot = timeslot[j].toString();
						if(temptime.localeCompare(temptimeslot)==0)
						{
							for(var iii=0; iii<mydata.data[i].ad_name.length; iii++)
							{
								slotavailable[j]--;
								adsname[j] += "<p> <i class='fas fa-caret-square-right' style='margin-right:15px'></i>" + mydata.data[i].ad_name[iii] + "</p>";
							}
						}
					}
				}
			}
			day++;
		}
	}
	for(var counter=0; counter<timeslot.length; counter++)
	{
		row = table.insertRow((counter+1));
		cell1 = row.insertCell(0);
		cell2 = row.insertCell(1);
		percentagetimeslot = (slotavailable[counter] / 10 * 100);
		totalpercentagetimeslot += percentagetimeslot;
		contentcell2 = "Average Price: RM 25.00<br>Weather: Sunny<br>Population: 1500++<br>Model A: <br>Model B: <br>Timeslot available: "
		+ percentagetimeslot + " %";
		if(adsname[counter]=="" || adsname[counter]==null)
		{
			contentcell3 = "No ads yet!";
		}
		else
		{
			contentcell3 = adsname[counter];
		}
		cell3 = row.insertCell(2);
		if(counter<=23)
		{
			cell1.innerHTML = timeslot[counter] + " a.m.";
		}
		else
		{
			cell1.innerHTML = timeslot[counter] + " p.m.";
		}
		cell2.innerHTML = contentcell2;
		cell3.innerHTML = contentcell3;
		if(percentagetimeslot>=80)
		{
			row.style.backgroundColor = "#BEFFBF";
		}
		else if(percentagetimeslot>=60)
		{
			row.style.backgroundColor = "#c1fa1d";
		}
		else if(percentagetimeslot>=40)
		{
			row.style.backgroundColor = "#f7f008";
		}
		else if(percentagetimeslot>=20)
		{
			row.style.backgroundColor = "#f77f08";
		}
		else
		{
			row.style.backgroundColor = "#f74e4b";
		}
	}
}
</script>
<script>
	function calendarcontent(){
	    var date = new Date(2020,01,01);
		var y = date.getFullYear();
		var m = date.getMonth();
		var d = date.getDate();
		var i, j, k, l,m, a=0, b=0, c=0, e=0; 
		/*i for loop next 3 years from current year
		  j for loop 12 month
		  k for loop all the day in a month
		  l for loop all the table data
		*/
		var price=10.00, timeslotavailable=2.00;
		var content = [];
		var tempcontent = [];
		var timeslot = [];
		var datetime = [];
		var percentage = [];
		var dayexist;
		//take the database calendar value
		var table1 = document.getElementById("calendardate");
		var table2 = document.getElementById("calendarpercentage");
		var tr1 = table1.getElementsByTagName("tr");
		var tr2 = table2.getElementsByTagName("tr");
		var td, td2, txtValue, txtValue2;
		for(l=0; l<tr1.length; l++)
		{
			td = tr1[l].getElementsByTagName("td")[0];
			if(td)
			{
				txtValue = td.textContent || td.innerText;
				datetime[a] = txtValue;
				a++;
			}
		}
		for(m=0; m<tr2.length; m++)
		{
			td2 = tr2[m].getElementsByTagName("td")[0];
			if(td2)
			{
				txtValue2 = td2.textContent || td2.innerText;
				percentage[b] = txtValue2;
				b++;
			}
		}
		for(i=0; i<5; i++)
		{
		for(j=0; j<12; j++)
		{
			var findday = new Date(y,(j+1),0).getDate();//find the right amount of day exist in the month
		for(k=0; k<findday; k++)
		{
			if(k<9)
			{
				var currentdate = String(y)+ "-0" + String(j+1) + "-0" + String(k+1);
			}
			else
			{
				var currentdate = String(y)+ "-0" + String(j+1) + "-" + String(k+1);
			}
			for(e=0; e<percentage.length; e++)
			{
				var existday = percentage[e].toString().slice(0,10);
				if(existday==currentdate)
				{
					dayexist = 1;
					theday = e;
					//percentage = findads(mydata[e]);
					break;
				}
				else
				{
					dayexist = 0;
				}
			}
			if(dayexist==1)
			{
				var percentageavailable = parseInt(percentage[theday].slice(10,15));
				if(percentageavailable>=80)
				{
					tempcontent[k] = {
									title:'Avg price: RM 25.00\nTimeslot left: '+String(percentageavailable)+'%',
									start: new Date(y,j,(k+1)),
									className: 'success',
								 };
				}
				else if(percentageavailable>=60)
				{
					tempcontent[k] = {
									title:'Avg price: RM 25.00\nTimeslot left: '+percentageavailable+'%',
									start: new Date(y,j,(k+1)),
									className: 'higher60',
								 };
				}
				else if(percentageavailable>=40)
				{
					tempcontent[k] = {
									title:'Avg price: RM 25.00\nTimeslot left: '+percentageavailable+'%',
									start: new Date(y,j,(k+1)),
									className: 'higher40',
								 };
				}
				else if(percentageavailable>=20)
				{
					tempcontent[k] = {
									title:'Avg price: RM 25.00\nTimeslot left: '+percentageavailable+'%',
									start: new Date(y,j,(k+1)),
									className: 'higher20',
								 };
				}
				else
				{
					tempcontent[k] = {
									title:'Avg price: RM 25.00\nTimeslot left: '+percentageavailable+'%',
									start: new Date(y,j,(k+1)),
									className: 'important',
								 };
				}
				content.push(tempcontent[k]);
			}
			else
			{
				tempcontent[k] = {
									title:'Avg price: RM 25.00'+'\nTimeslot left: 100%',
									start: new Date(y,j,(k+1)),
									className: 'success',
								 };
				content.push(tempcontent[k]);
			}
		}
		}
		y = y+1;
		}
		return content;
		}
	function showcalendarcontent(signage_id) {
		/*  className colors

		className: default(transparent), important(red), chill(pink), success(green), info(blue)

		*/


		/* initialize the external events
		-----------------------------------------------------------------*/
		$('#external-events div.external-event').each(function() {

			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text())// use the element's text as the event title
			};

			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
		});

		/* initialize the calendar
		-----------------------------------------------------------------*/
		var timeslotview = document.getElementById("timeslotvw");
		var calendarview = document.getElementById("wrap");
		var csstimeslot = document.getElementById("DOMContentLoaded","cssfortimeslot");
		var content = [];
		content = calendarcontent();
		var calendar =  $('#calendar').fullCalendar({
			header: {
				left: 'today',
				center: 'title',
				right: 'prev,next'
			},
			editable: true,
			firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
			selectable: true,
			defaultView: 'month',
			
			axisFormat: 'h:mm',
			columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
			allDaySlot: false,
			selectHelper: true,
			select: function(start, end, allDay) {
				timeslotview.style.display = "block";
				calendarview.style.display = "none";
				starty = start.getFullYear();
				startm = start.getMonth();
				startd = start.getDate();
				if(parseInt(startd)<10)
				{
					start = String(starty) + "-0" + String(startm+1) + "-0" + String(startd);
				}
				else
				{
					start = String(starty) + "-0" + String(startm+1) + "-" + String(startd);
				}
				//csstimeslot.disabled = false;
				findads('1037', '01', '2020', '12', start);
				calendar.fullCalendar('unselect');
			},
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped

				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');

				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);

				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;

				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
			},
			events: content,
		});
	}
	function closewd()
	{
		var timeslotview = document.getElementById("timeslotvw");
		var calendarview = document.getElementById("wrap");
		var csstimeslot = document.getElementById("cssfortimeslot");
		timeslotview.style.display = "none";
		calendarview.style.display = "block";
		csstimeslot.disabled = true;
		removetimetable();
	}
	window.onclick = function(event)
	{
		var timeslotview = document.getElementById("timeslotvw");
		var calendarview = document.getElementById("wrap");
		var csstimeslot = document.getElementById("cssfortimeslot");
		if(event.target == timeslotview)
		{
			timeslotview.style.display = "none";
			calendarview.style.display = "block";
			csstimeslot.disabled = true;
			removetimetable();
		}
	}
	function removetimetable()
	{
		var table = document.getElementById("adstime");
		for(var i=0; i<48; i++)
		{
			table.deleteRow(1);
		}
	}

</script>