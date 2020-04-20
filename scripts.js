
//when edit butt is clciked, retrieve data from corresponding row
//jquery $ is global variable, uses click event listener and passes listener as e into function
$(".btnedit").click(e => {
    //All JQuery. Retrieve data from row
   let textvalues = displayData(e);

   //find the input elements with attributes name and specified names, point to them
   let id = $("input[name*='member_id']");
   let ssn = $("input[name*='member_ssn']");
   let fname = $("input[name*='member_fname']");
   let lname = $("input[name*='member_lname']");
   let gender = $("input[name*='member_gender']");
   let dob = $("input[name*='member_dob']");
   let dependents = $("input[name*='member_dependents']");
   let policy = $("input[name*='member_policy']");
   let medical = $("input[name*='member_medical']");
   let dental = $("input[name*='member_dental']");
   let vision = $("input[name*='member_vision']");

   //assign the values retrieved earlier to the location of the pointers
   id.val(textvalues[0]);
   ssn.val(textvalues[1]);
   fname.val(textvalues[2]);
   lname.val(textvalues[3]);
   gender.val(textvalues[4]);
   dob.val(textvalues[5]);
   dependents.val(textvalues[6]);
   policy.val(textvalues[7])
   medical.val(textvalues[8]);
   dental.val(textvalues[9]);
   vision.val(textvalues[10]);
});

function displayData(e) {
    let id = 0;
    //tabledata uses jquery
    const tabledata = $("#tbody tr td");
    let textValues = [];

    for(const value of tabledata) {
        //dataset.id utilizes attribute dataset-id of <td> 
        if(value.dataset.id == e.target.dataset.id) {
            //add text content from tags with dataset-id attributes into textValues
            textValues[id++] = value.textContent;
        }
    }
    return textValues;
}
