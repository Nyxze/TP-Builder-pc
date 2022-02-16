$(document).ready(function($){
	
	
	let totalPrice = 0
	let prixBoitier = 0
	let prixCM = 0
	let prixCG = 0
	let prixDD = 0
	let prixProc = 0
	let prixRAM = 0
	
	function writeSelect(previous,created,currentTable){

		if (previous.val()=='') {
			created.css('display', 'none')
		} else {
			created.css('display','block');
		}
		for (let i = 0; i < currentTable.length+1; i++) {
			
			let adds = "<option>"
			if (i==0) {
				adds += "veuillez choisir"
				switch (previous[0].id) {
					case "cartemere":
							adds += "une carte graphique </option>"
						break;
					case "cartegraphique":
						adds += "un disque dur </option>"
					break;
					case "disquedur":
						adds += "un processeur </option>"
					break;
					case "processeur":
						adds += " des barette de ram </option>"
					break;
					case "RAM":
						adds += "des barrette de RAM</option>"
					break;
					default:
						adds += "une carte mere"
					break;
				}

			}else{
				console.log(i)
				adds = adds + currentTable[i-1].nom + "</option>"
			}
			created.append($(adds).attr("class", "popable"));
			
		}
	}

	function priceInteger(id,nom,data,variableG) {

		let price = $("#price")
		let total = $("#costT")
		let cost = ""

		table = "<tr id='"+id+"'><td>"+nom+"</td>"

		for (let i = 0; i < data.length; i++) {
			if (data[i].nom == nom) {
				cost = data[i].prix
				break
			}
		}

		if ($('#'+id).length) {
			cost *= 1
			$("#"+id).remove()
			totalPrice = totalPrice - variableG
			if (totalPrice < 0 ) {
				totalPrice = 0
			}
			
		}

		cost *= 1
		totalPrice *= 1

		variableG = cost
		totalPrice = totalPrice + cost		

		table += "<td> "+cost+"€ </td></tr>"
		variableG = cost
		price.append($(table));
		totalPrice.toFixed(2)
		total.contents()[0].nodeValue = totalPrice + " €";
		return variableG
	}

	$('#boitier').change(async function(e){
		let data = await $.getJSON("data.json");
		console.log(data)

		let boit = $('#boitier')
		let CM = $('#cartemere') 
		CM.empty();
		$('#choixCM').empty()
		
		if (boit.val()=='' || boit.val() == "barebone") {
			CM.css('display', 'none')
		} else {
			CM.css('display','block');
		}

		prixBoitier =  priceInteger("boitierprix",boit.val(),data[0].boitier, prixBoitier)

		if (boit.val() != "barebone") {
			for (let i = 0; i < data[0].compatible.length; i++) {

				let adds = "<option>"

				if (data[0].compatible[i].nomboite == boit.val() ) {

					adds = adds + data[0].compatible[i].nomCM + "</option>"
					CM.append($(adds).attr("class", "popable"));
				}
			}
		} else {
			$("<p>ce boitier etant un barebone , vous n'avez pas a choisir de carte mere<p>").appendTo("#choixCM")

			let data = await $.getJSON("data.json");
		
			let CG = $('#cartegraphique')
			let DD = $('#disquedur') 
			DD.empty();
			
			writeSelect(CG, DD, data[0].disque_dur)
		}
	});
	
	$('#cartemere').change(async function(e){

		let data = await $.getJSON("data.json");
		
		let CM = $('#cartemere')
		let CG = $('#cartegraphique') 
		CG.empty();
		
		writeSelect(CM, CG, data[0].carte_graphique)
		prixCM = priceInteger("CMprix", CM.val(), data[0].carte_mere, prixCM)
	});
	
	$('#cartegraphique').change(async function(e){

		let data = await $.getJSON("data.json");
		
		let CG = $('#cartegraphique')
		let DD = $('#disquedur') 
		DD.empty();
		
		writeSelect(CG, DD, data[0].disque_dur)
		prixCG = priceInteger("CGprix", CG.val(), data[0].carte_graphique, prixCG)
		
	});

	$('#disquedur').change(async function(e){
		
		let data = await $.getJSON("data.json");
		
		let DD = $('#disquedur')
		let PROC = $('#processeur') 
		PROC.empty();

		writeSelect(DD, PROC, data[0].processeur)
		prixDD = priceInteger("DDprix", DD.val(), data[0].disque_dur, prixDD)
	});
	
	$('#processeur').change(async function(e){
		
		let data = await $.getJSON("data.json");
		
		let PROC = $('#processeur')
		let RAM = $('#RAM') 
		RAM.empty();

		writeSelect(PROC, RAM, data[0].ram)
		prixProc = priceInteger("PROCprix", PROC.val(), data[0].processeur, prixProc)
	});

	$('#RAM').change(async function(e){
		
		let data = await $.getJSON("data.json");
		
		let RAM = $('#RAM')

		prixRAM = priceInteger("RAMprix", RAM.val(), data[0].ram, prixRAM)
	});

});