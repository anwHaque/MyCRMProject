function addEnquiry()
{
    $('#mainArea').load('src/enquiry/enquiryForm.php');
}


function readEnquiry()
{
    $('#mainArea').load('src/enquiry/readEnquiry.php');

}

function selectTypeFun(value){
    // console.log(value);
    var myDiv = document.getElementById("stateSelect");
    if(value == "Student"){
        myDiv.innerHTML = '<option value="" hidden >Select Status</option><option value="Enquiry">Enquiry</option><option value="Confirm">Confirm</option><option value="Registered">Registered</option>';
    }
    else{
        
        myDiv.innerHTML = '<option value="" hidden >Select Status</option><option value="Enquiry">Enquiry</option><option value="Interview">Interview</option><option value="Confirm">Confirm</option><option value="Registered">Registered</option>';
    }
    return false;
}


function enquirySubmit()
{
    $.ajax({
        type: "post",
        url: "src/enquiry/enquiry.php",
        data:$('#inquiryForm').serialize(),
        success:function(response){
            $('#sms').html(response);
        }
    });
    return false;
}


function enquiryEdit(Id)
{
    // console.log(v);
    $.ajax({
        type: 'post',
        url: 'src/enquiry/enquiryEdit.php',
        data:{Id: Id},
        success:function(response){
            $('#mainArea').html(response);
        }
    });
    return false;
}


function enquiryUpdate(Id,type)
{
    // enquiryEdit(Id);
    // console.log(v);
    console.log(type);
    $.ajax({
        type: 'post',
        url: 'src/enquiry/enquiryUpdate.php',
        data:{
            Id: Id,
            type: type
        },
        success:function(response){
            $('#mainArea').html(response);
        }
    });
    return false;
}


function enquiryDelete(v)
{
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
        
            $.ajax({
                type: 'post',
                url: 'src/enquiry/enquiryDelete.php',
                data:{v: v},
                success:function(response){
                    $('#mainArea').html(response);
                }
            });
        }
    })
    return false;
}

//Enquiry Edit Save 
function enquiryEditSave(Id,sId)
{
    var formData = new FormData($("#inquiryForm")[0]);
    formData.append("Id", Id);
    formData.append("sId", sId);
    // console.log(formData);
    // console.log(typeof(formData));
    $.ajax({
        type: 'post',
        url: 'src/enquiry/enquiryEditSave.php',
        data:formData,
        processData: false,
        contentType: false,
        success:function(response)
        {
            $('#mainArea').html(response);
        }
    });

    return false;
}

function enquiryUpdateSave(id)
{
    console.log(Id);
    var formData = new FormData($("#inquiryForm")[0]);
    formData.append("Id", Id);
    $.ajax({
        type: 'post',
        url: 'src/enquiry/enquiryUpdateSave.php',
        data:formData,
        processData: false,
        contentType: false,
        success:function(response){
            $('#mainArea').html(response);
        }
    });
    return false
}

function statusDelete(Id,sId)
{
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'post',
                url: 'src/enquiry/statusDelete.php',
                data:{
                    Id: Id,
                    sId: sId
                },
                success:function(response){
                    $('#mainArea').html(response);
                }
            });
        }
    })
    return false;
}