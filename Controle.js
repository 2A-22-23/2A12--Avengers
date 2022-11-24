
function Verif(){
    var string = [];
	var lowercase = /[a-z]/g;
	var uppercase = /[A-Z]/g;
	var numbers = /[0-9]/g;

    /////////////Nom Produit
    string = document.getElementById("marque").value;
	if((string[0] < 'A')||(string > 'Z') || (string == "")){
		console.log(string);
		let error = document.getElementById("test1").innerHTML = "<label id = 'marque' style = 'color: red; font-weight: bold;'>&emsp;*Marque doit commencer par une lettre majuscule</label>";
	}
	else{
		let error = document.getElementById("test1").innerHTML = "<label id = 'marque'></label>";
	}
	////////////////// Nom Categorie///////////////////////////
	string = document.getElementById("NomC").value;
	if((string[0] < 'A')||(string > 'Z') || (string == "")){
		console.log(string);
		let error = document.getElementById("testt").innerHTML = "<label id = 'NomC' style = 'color: red; font-weight: bold;'>&emsp;*Nom Categorie doit commencer par une lettre majuscule</label>";
	}
	else{
		let error = document.getElementById("testt").innerHTML = "<label id = 'NomC'></label>";
	}
    ////////////////////////////// Couleur ////////////////////////
    string = document.getElementById("couleur").value;
	if((string[0] < 'A')||(string > 'Z') || (string == "")){
		console.log(string);
		let error = document.getElementById("test2").innerHTML = "<label id = 'couleur' style = 'color: red; font-weight: bold;'>&emsp;*Marque doit commencer par une lettre majuscule</label>";
	}
	else{
		let error = document.getElementById("test2").innerHTML = "<label id = 'couleur'></label>";
	}
    //Kilometrage
    numbers = document.getElementById("kilometrage").value;
	if(numbers == "1000"){
		console.log(numbers);
		let error = document.getElementById("test3").innerHTML = "<label id = 'kilometrage' style = 'color: red; font-weight: bold;'>&emsp;*kilometrage ne doit pas etre vide</label>";
	}
	else{
		let error = document.getElementById("test3").innerHTML = "<label id = 'kilometrage'></label>";
	}

    //Quantite
    numbers = document.getElementById("carburant").value;
	if((numbers < 0 )|| (numbers > 20 ) || (numbers == "")){
		console.log(numbers);
		let error = document.getElementById("test4").innerHTML = "<label id = 'carburant' style = 'color: red; font-weight: bold;'>&emsp;*Quantite ne doit pas etre vide ni négative</label>";
	}
	else{
		let error = document.getElementById("test4").innerHTML = "<label id = 'carburant'></label>";
	}
	
}