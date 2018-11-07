<?php 
    require 'enquiryEdit.php';
 ?>

 <script>
    $('#enquiryUpdate').replaceWith('<button onclick="return enquiryUpdateSave('+Id+')">UpdateStatus</button>');
     
    document.getElementById('addMoreDiv').innerHTML = '<button onclick="return addMore()">addMore</button><br>';
     
    document.getElementById('stateSelect').name = "stateSelect[]";
    document.getElementById('stateDate').name = "stateDate[]";
    var i=0;

    function addMore() {
        i++;
        var status = document.getElementById('stateSelect').cloneNode(true);
        var div = document.createElement("div");
            div.id = i;
        var span = document.createElement('span');
            span.innerHTML = '<input type="date" name="stateDate[]" id="stateDate"><button id="btn" onclick="return deleteMore('+i+')">Delete</button>';
        var br = document.createElement("br");
        document.getElementById("addMoreDis").appendChild(div);
        document.getElementById(i).appendChild(status);
        document.getElementById(i).appendChild(span);
        document.getElementById(i).appendChild(br);
        return false;
    }

    function deleteMore(value){
        var p = document.getElementById(value).innerHTML = '';
        return false; 
    }

    document.getElementById("firstName").disabled = true;
    document.getElementById("lastName").disabled = true;
    document.getElementById("depName").disabled = true;
    document.getElementById("typeSelect").disabled = true;
     
 </script>
 