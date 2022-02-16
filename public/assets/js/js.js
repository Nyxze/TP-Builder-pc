

function populateComponentOptions(data){
	console.log(data);

    $.each(data, function(key,val) {  
        console.log(key)
        $.each(val, function(id,name){
            // console.log(k);
            // console.log(name.name);
            $(`#${key}`)
            .append($('<option>', { value : id })
            .text(name.name));
        })
        $(`#${key}`).removeAttr('hidden')
    
   });

};



	async function requestComponentFromDatabase(component){

		const response = await fetch(`http://localhost:8000/api/${component}/all`)
  		const data = await response.json();
		
  		return data
  	
};
	async function requestComponentById(component, id ){
		const response = await fetch(`http://localhost:8000/api/${component}/${id}`)
  		const data = await response.json();
		console.log(data);
  		return data
  	
};
//add select when select-case 
//ajouter id differente en fonction du component

$(document).ready(function () {

    requestComponentFromDatabase("PcCase").then(populateComponentOptions)
//Clone du template


//Lors d'un clic, prendre le clone, rajouter un nom genre computer[ram], computer[mb],
//
$("#PcCase").change(function(e){
    console.log(e);
    requestComponentFromDatabase("motherboard").then(populateComponentOptions);
	}
)
$("#motherboard").change(function(e){
    console.log(e);
    requestComponentFromDatabase("cpu").then(populateComponentOptions);
	}
)
$("#cpu").change(function(e){
    console.log(e);
    requestComponentFromDatabase("gpu").then(populateComponentOptions);
	}
)

$("#gpu").change(function(e){
    console.log(e);
    requestComponentFromDatabase("hdd").then(populateComponentOptions);
	}
)

})