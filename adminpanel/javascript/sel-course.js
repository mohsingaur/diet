function _(el){ return document.getElementById('el'); }

	function selFaculty(br,fc) {
		var fc = _(fc); //get faculty id
		var br = _(br); //get faculty branch
		br.innerHTML = "";
		if(fc.value == "4"){
			var optionArray = ["|SELECT Course","BTech|BTech","Diploma|Diploma"];
		}
		else if(fc.value == 10){
			var optionArray = ["|SELECT DEPARTMENT","|BBA/BBS"];
		}
		for (var option in optionArray){
			var pair = optionArray[option].split("|");
			var newOption = document.createElement("option");
			newOption.value = pair[0];
			newOption.innerHTML = pair[1];
			br.options.add(newOption);
		}
	}

	function selBranch(cr,br) {
		var cr = document.getElementById(cr);
		var br = document.getElementById(br);
		br.innerHTML = "";
		if(cr.value == "BTech" || cr.value == "Diploma"){
			var optionArray = ["|SELECT BRANCH","Computer Science|Computer Science","Civil|Civil","Electronics|Electronics","Electrical|Electrical","Mechanical|Mechanical"];
		}
		else if(cr.value == "BBA"){
			var optionArray = ["|SELECT DEPARTMENT","BBA|BBA/BBS"];
		}
		for (var option in optionArray){
			var pair = optionArray[option].split("|");
			var newOption = document.createElement("option");
			newOption.value = pair[0];
			newOption.innerHTML = pair[1];
			br.options.add(newOption);
		}
	}

	function selSem(cr,sem)	
	{
		var cr = document.getElementById(cr);
		var sem = document.getElementById(sem);
		sem.innerHTML = "";
		if(cr.value == "BTech"){
			var optArray = ["|SELECT SEMESTER","semester 1|Semester 1","semester 2|Semester 2","semester 3|Semester 3","Semester 4|Semester 4","semester 5|Semester 5","semester 6|Semester 6","semester 7|Semester 7","Semester 8|Semester 8"];
		}
		else if(cr.value == "Diploma"){
			var optArray = ["|SELECT SEMESTER","semester 1|Semester 1","semester 2|Semester 2","semester 3|Semester 3","semester 4|Semester 4","semester 5|Semester 5","semester 6|Semester 6"];
		}
		else if(cr.value == "BBA"){
			var optArray = ["|SELECT SEMESTER","semester 1|Semester 1","semester 2|Semester 2","semester 3|Semester 3","semester 4|Semester 4","semester 5|Semester 5","semester 6|Semester 6"];
		}
		for (var opt in optArray){
			var pr = optArray[opt].split("|");
			var newOpt = document.createElement("option");
			newOpt.value = pr[0];
			newOpt.innerHTML = pr[1];
			sem.options.add(newOpt);
		}
	}

	function selSub(sem,br,cr,sub)	
	{
		var sem = document.getElementById(sem);
		var br = document.getElementById(br);
		var cr = document.getElementById(cr);
		var sub = document.getElementById(sub);
		sub.innerHTML = "";
		if(sem.value == "semester 1" && br.value == "Computer Science" && cr.value == "Diploma"){
			var optArray = ["|SELECT SUBJECT","Applied Mathematics-I|Applied Mathematics-I","Communication Skill-I|Communicatio Skill-I","Fundamental of Computer|Fundamental of Computer","Electrical & Electronics Engg|Electrical & Electronics Engg","Elements of Mechanical Engg|Elements of Mechanical Engg"];
		}
		else if(sem.value == "semester 2" && br.value == "Computer Science" && cr.value == "Diploma"){
			var optArray = ["|SELECT SUBJECT","Applied Mathematics-II|Applied Mathematics-II","Engg Chemistry and Environmental Sciences|Engg Chemistry and Environmental Sciences","Programming in C|Programming in C","Electronics devices and Application|Electronics devices and Application","Applied Physics|Applied Physics"];
		}
		else if(sem.value == "semester 3" && br.value == "Computer Science" && cr.value == "Diploma"){
			var optArray = ["|SELECT SUBJECT","Conputer Oriented Numeriacal Method|Conputer Oriented Numeriacal Method","Object Oriented Programming|Object Oriented Programming","Signal and System|Signal and System","Computer Architecture|Computer Architecture","Digital Electronics|Digital Electronics"];
		}
		else if(sem.value == "semester 4" && br.value == "Computer Science" && cr.value == "Diploma"){
			var optArray = ["|SELECT SUBJECT","Communication Skill-II|Communication Skill-II","Database Management System|Database Management System","Operating System|Operating System","Data Structure|Data Structure","Microprocessor And Microcontroller|Microprocessor And Microcontroller"];
		}
		else if(sem.value == "semester 5" && br.value == "Computer Science" && cr.value == "Diploma"){
			var optArray = ["|SELECT SUBJECT","Computer Graphics|Computer Graphics","Web Technology|Web Technology","Data Communcation and Computer Networks|Data Communcation and Computer Networks","Software Engineering|Software Engineering","Java Programming|Java Programming"];
		}
		else if(sem.value == "semester 6" && br.value == "Computer Science" && cr.value == "Diploma"){
			var optArray = ["|SELECT SUBJECT","Advanced RDBMS|Advanced RDBMS","Visual Programming|Visual Programming","Information Security and Cyber Law|Information Security and Cyber Law","ICT Management and enterpreneurship development|ICT Management and enterpreneurship development","Embedded System|Embedded System","Artificial Intelligence|Artificial Intelligence","Mobile Computing|Mobile Computing"];
		}
		for (var opt in optArray){
			var pr = optArray[opt].split("|");
			var newOpt = document.createElement("option");
			newOpt.value = pr[0];
			newOpt.innerHTML = pr[1];
			sub.options.add(newOpt);
		}
	}

function selYear(sem,yr)	
	{
		var sem = document.getElementById(sem);
		var yr = document.getElementById(yr);
		yr.innerHTML = "";
		if(sem.value == "semester 1" || sem.value == "semester 2" || sem.value == "semester 3" || sem.value == "semester 4" || sem.value == "semester 4" || sem.value == "semester 5" || sem.value == "semester 6" || sem.value == "semester 7" || sem.value == "semester 8"){
			var optArray = ["|SELECT YEAR","2013|2013","2014|2014","2015|2015","2016|2016"];
		}
		for (var opt in optArray){
			var pr = optArray[opt].split("|");
			var newOpt = document.createElement("option");
			newOpt.value = pr[0];
			newOpt.innerHTML = pr[1];
			yr.options.add(newOpt);
		}
	}

function searchBy(src,nxt)	
	{
		var src = document.getElementById(src);
		var nxt = document.getElementById(nxt);
		nxt.innerHTML = "";
		if(src.value == "course"){
			var optArray = ["|Select Course","BTech|B Tech","BBA|BBA/BBS","Diploma|Diploma Engg"];
		}
		else if(src.value == "branch"){
			var optArray = ["|SELECT BRANCH","Computer Science|Computer Science","Civil|Civil","Electronics|Electronics","Electrical|Electrical","Mechanical|Mechanical","bba|BBA/BBS"];
		}
		else if(src.value == "subject"){
			var optArray = ["|SELECT SUBJECT","Applied Mathematics-I|Applied Mathematics-I","Communication Skill-I|Communicatio Skill-I","Fundamental of Computer|Fundamental of Computer","Electrical & Electronics Engg|Electrical & Electronics Engg","Elements of Mechanical Engg|Elements of Mechanical Engg","Applied Mathematics-II|Applied Mathematics-II","Engg Chemistry and Environmental Sciences|Engg Chemistry and Environmental Sciences","Programming in C|Programming in C","Electronics devices and Application|Electronics devices and Application","Applied Physics|Applied Physics","Conputer Oriented Numeriacal Method|Conputer Oriented Numeriacal Method","Object Oriented Programming|Object Oriented Programming","Signal and System|Signal and System","Computer Architecture|Computer Architecture","Digital Electronics|Digital Electronics","Communication Skill-II|Communication Skill-II","Database Management System|Database Management System","Operating System|Operating System","Data Structure|Data Structure","Microprocessor And Microcontroller|Microprocessor And Microcontroller","Computer Graphics|Computer Graphics","Web Technology|Web Technology","Data Communcation and Computer Networks|Data Communcation and Computer Networks","Software Engineering|Software Engineering","Java Programming|Java Programming","Advanced RDBMS|Advanced RDBMS","Visual Programming|Visual Programming","Information Security and Cyber Law|Information Security and Cyber Law","ICT Management and enterpreneurship development|ICT Management and enterpreneurship development","Embedded System|Embedded System","Artificial Intelligence|Artificial Intelligence","Mobile Computing|Mobile Computing"];
		}
		else if(src.value == "semester"){
			var optArray = ["|SELECT SEMESTER","semester 1|Semester 1","semester 2|Semester 2","semester 3|Semester 3","Semester 4|Semester 4","semester 5|Semester 5","semester 6|Semester 6","semester 7|Semester 7","Semester 8|Semester 8"];
		}
		else if(src.value == "year"){
			var optArray = ["|SELECT YEAR","2013|2013","2014|2014","2015|2015","2016|2016"];
		}
		for (var opt in optArray){
			var pr = optArray[opt].split("|");
			var newOpt = document.createElement("option");
			newOpt.value = pr[0];
			newOpt.innerHTML = pr[1];
			nxt.options.add(newOpt);
		}
	}







	function _(el){
	return document.getElementById(el);
	}

	function clock() {
		var d = new Date();
		var time = d.toLocaleTimeString();
		_("time").innerHTML = "Time: "+time;
		var timer = setTimeout("clock()",1000);
	}


//############################ Validation form ###############################
	function validateForm(form){
	
	if(form.course.value==""){
		alert('Please enter course...');
		form.course.focus();
		return(false);
	}
	else if(form.branch.value==""){
		alert('Please enter branch...');
		form.branch.focus();
		return(false);
	}
	else if(form.sem.value==""){
		alert('Please enter Semester...');
		form.sem.focus();
		return(false);
	}
	else if(form.sub.value==""){
		alert('Please enter subject...');
		form.sub.focus();
		return(false);
	}
	else if(form.year.value==""){
		alert('Please enter year...');
		form.year.focus();
		return(false);
	}
	else if (form.uname.value == "") {
		alert('Please enter user id...');
		form.uname.focus();
		return(false);
	}
	else if(form.pas.value==""){
		alert('Please enter password...');
		form.pass.focus();
		return(false);
	}
	else return (true);
}
	