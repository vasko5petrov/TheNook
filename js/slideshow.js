var nrImg = 4;
	var IntSeconds = 5;

	window.Load = function(){

		nrShown = 0;
		Vect = new Array(nrImg + 10);
		Vect[0] = document.getElementById("Img1");
		Vect[0].style.visibility = "visible";
		for(var i=1;i<nrImg;i++){
			Vect[i] = document.getElementById("Img" + (i+1));
		}
		myTime = setInterval(Timer, IntSeconds * 1000);
	}
	window.Timer = function(){
		nrShown++;
		if(nrShown == nrImg)
			nrShown = 0;
		Effect();
	}
	window.next = function(){
		nrShown++;
		if(nrShown == nrImg)
			nrShown = 0;
		Effect();

		clearInterval(myTime);
		myTime = setInterval(Timer, IntSeconds * 1000);
	}
	window.previous = function(){
		nrShown--;
		if(nrShown == -1)
			nrShown = nrImg - 1;
		Effect();

		clearInterval(myTime);
		myTime = setInterval(Timer, IntSeconds * 1000);
	}
	window.Effect = function(){
		for(var i=0;i<nrImg;i++){
			Vect[i].style.opacity = "0";
			Vect[i].style.visibility = "hidden";
		}
		Vect[nrShown].style.opacity = "1";
		Vect[nrShown].style.visibility = "visible";
	}