const pollnumber=document.getElementById("counted");
const form= document.getElementById("candidate");


pollnumber.addEventListener('input',addItem);
function addItem(e){
    e.preventDefault();
    number_of_candidate=pollnumber.value;
    int_can = parseInt(number_of_candidate)
    output = ""; 
    
    for(i=1;i<=int_can;i++){
        output += `<label id=\"form-label\">Image${i} </label> 
        <input type=\"file\" name=\"upload${i}\">   
        <label id=\"form-label\">candidate${i}:</label>   
        <input id=\"candidate\"  type=text name=\"candidate${i}\" required>`;
    form.innerHTML = output;
}}
