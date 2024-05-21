//submit form for upload page
//alert(123);
function submit_upload(){
    var formData = new FormData(); //create FormData object
    formData.append('act','submit_upload');
    var file = document.getElementById("file_input").files[0]; //Get the selected file object
    formData.append('file', file); //Adding files to formData
    var t = $('.upload_form').serializeArray();
    $.each(t, function() {
        formData.append(this.name, this.value); //Adding files to formData
    });
    console.log(formData)
    //only upload the selected resource type 
    console.log(formData.get('resource_type'))
    if(formData.get('resource_type')==1){
        console.log(formData.get('file'))
        if(formData.get('file')=='undefined'){
            alert('Please choose file')
            return false;
        }
    }
    if(formData.get('resource_type')==2){
        if(formData.get('text_input')==''){
            alert('You have choose Text input. Please enter the text')
            return false;
        }    
    }
    if(formData.get('resource_type')==3){
        if(formData.get('linkInput')==''){
            alert('You have choose link input. Please enter link')
            return false;
        }
    }
    
    var url='ajax.php';
    $.ajax({
        type : 'post',
        dataType:'json', //Specifies that the server returns data in JSON format.
        processData: false, //No processing of sent data (mandatory)
        contentType: false, //No Content-Type headers (required)
        data: formData, //Pass form data as a parameter
        url :url,
        success : function(res){
            if(res.code){
                //alert(res.msg)
                $('.upload_form').trigger("reset");
                var resource_id = res.resource_id;
                //jump to successfully page
                window.location.href = "successfully.php?type=upload&resource_id="+resource_id;
            }else{
                alert(res.msg)
            }
        }
    })
    return false;
}
//submit form for comment function
function submit_comment()
{
    var formData = new FormData(); //create FormData object
    formData.append('act','submit_comment');
    var t = $('.upload_comment').serializeArray();
    $.each(t, function() {
        formData.append(this.name, this.value); //Adding files to formData
    });
    
    var url='ajax.php';
    $.ajax({
        type : 'post',
        dataType:'json', //Specifies that the server returns data in JSON format.
        processData: false, //No processing of sent data (mandatory)
        contentType: false, //No Content-Type headers (required)
        data: formData, //Pass form data as a parameter
        url :url,
        success : function(res){
            if(res.code){
                //alert(res.msg)
                $('.upload_comment').trigger("reset");
                window.location.reload()
            }else{
                alert(res.msg)
            }
        }
    })
    return false;
}

function submit_update(){
    var formData = new FormData(); //create FormData object
    formData.append('act','submit_update');
    var file = document.getElementById("file_input").files[0]; //Get the selected file object
    formData.append('file', file); //Adding files to formData
    var t = $('.update_form').serializeArray();
    $.each(t, function() {
        formData.append(this.name, this.value); //Adding files to formData
    });
    console.log(formData)
    //only upload the selected resource type 
    console.log(formData.get('resource_type'))
    console.log(formData.get('ori_file'))
    /*
    if(formData.get('resource_type')==1){
        console.log(formData.get('file'))
        if(formData.get('file')=='undefined'){
            alert('Please choose file')
            return false;
        }
    }*/
    if(formData.get('resource_type')==2){
        if(formData.get('text_input')==''){
            alert('You have choose Text input. Please enter the text')
            return false;
        }    
    }
    if(formData.get('resource_type')==3){
        if(formData.get('linkInput')==''){
            alert('You have choose link input. Please enter link')
            return false;
        }
    }
    
    var url='ajax.php';
    $.ajax({
        type : 'post',
        dataType:'json', //Specifies that the server returns data in JSON format.
        processData: false, //No processing of sent data (mandatory)
        contentType: false, //No Content-Type headers (required)
        data: formData, //Pass form data as a parameter
        url :url,
        success : function(res){
            if(res.code){
                //alert(res.msg)
                $('.update_form').trigger("reset");
                var resource_id = res.resource_id;
                //jrump to page to show has success
                window.location.href = 'successfully.php?type=edit&resource_id='+resource_id;
            }else{
                alert(res.msg)
            }
        }
    })
    return false;
}

$(document).on('mousewheel', function(event) {
    var winHeight = $(window).height();
    var docHeight = $(document).height();
    var scrollTop = $(window).scrollTop();
    var distanceToBottom = docHeight - winHeight - scrollTop;
    if(distanceToBottom>=100){
        $(".forum-submint").addClass('forum-bottom');
        $(".review-submint").addClass('review-bottom');
    }else{
        $(".forum-submint").removeClass('forum-bottom'); 
        $(".review-submint").removeClass('review-bottom'); 
    }
    console.log(distanceToBottom);
  });

function toSend(id){
    console.log(id)
    $('.forum-submint-popup .forum_id').val(id)
    $(".popup").show();
} 
function toSend_r(id){
    console.log(id)
    $('.review-submint-popup .review_id').val(id)
    $(".popup").show();
} 
function closePopup(){
    $(".popup").hide();
    return false
}

function submit_forum(){
    var formData = new FormData(); //create FormData object
    formData.append('act','submit_forum');
    var t = $('.forum-submint-form').serializeArray();
    $.each(t, function() {
        formData.append(this.name, this.value); //Adding files to formData
    });
    if(formData.get('comment')==''){
        alert("please comment");
        return false;
    }
    var url='ajax.php';
    $.ajax({
        type : 'post',
        dataType:'json', //Specifies that the server returns data in JSON format.
        processData: false, //No processing of sent data (mandatory)
        contentType: false, //No Content-Type headers (required)
        data: formData, //Pass form data as a parameter
        url :url,
        success : function(res){
            if(res.code){
                //alert(res.msg)
                $('.forum-submint-form').trigger("reset");
                window.location.reload()
            }else{
                alert(res.msg)
            }
        }
    })
    return false;
}
function popup_submit_forum(){
    var formData = new FormData(); //create FormData object
    formData.append('act','submit_forum');
    var t = $('.forum-submint-popup').serializeArray();
    $.each(t, function() {
        formData.append(this.name, this.value); //Adding files to formData
    });
    if(formData.get('comment')==''){
        alert("please comment");
        return false;
    }
    var url='ajax.php';
    $.ajax({
        type : 'post',
        dataType:'json', //Specifies that the server returns data in JSON format.
        processData: false, //No processing of sent data (mandatory)
        contentType: false, //No Content-Type headers (required)
        data: formData, //Pass form data as a parameter
        url :url,
        success : function(res){
            if(res.code){
                //alert(res.msg)
                $('.forum-submint-form').trigger("reset");
                window.location.reload()
            }else{
                alert(res.msg)
            }
        }
    })
    return false;
}
function submit_review(){
    var formData = new FormData(); //create FormData object
    formData.append('act','submit_review');
    var t = $('.review-submint-form').serializeArray();
    $.each(t, function() {
        formData.append(this.name, this.value); //Adding files to formData
    });
    if(formData.get('comment')==''){
        alert("please comment");
        return false;
    }
    var url='ajax.php';
    $.ajax({
        type : 'post',
        dataType:'json', //Specifies that the server returns data in JSON format.
        processData: false, //No processing of sent data (mandatory)
        contentType: false, //No Content-Type headers (required)
        data: formData, //Pass form data as a parameter
        url :url,
        success : function(res){
            if(res.code){
                //alert(res.msg)
                $('.review-submint-form').trigger("reset");
                window.location.reload()
            }else{
                alert(res.msg)
            }
        }
    })
    return false;
}
function popup_submit_review(){
    var formData = new FormData(); //create FormData object
    formData.append('act','submit_review');
    var t = $('.review-submint-popup').serializeArray();
    $.each(t, function() {
        formData.append(this.name, this.value); //Adding files to formData
    });
    if(formData.get('comment')==''){
        alert("please comment");
        return false;
    }
    var url='ajax.php';
    $.ajax({
        type : 'post',
        dataType:'json', //Specifies that the server returns data in JSON format.
        processData: false, //No processing of sent data (mandatory)
        contentType: false, //No Content-Type headers (required)
        data: formData, //Pass form data as a parameter
        url :url,
        success : function(res){
            if(res.code){
                //alert(res.msg)
                $('.review-submint-form').trigger("reset");
                window.location.reload()
            }else{
                alert(res.msg)
            }
        }
    })
    return false;
}
function toLike(forum_id){
    var formData = new FormData(); //create FormData object
    formData.append('act','toLike');
    formData.append('forum_id',forum_id);
    var url='ajax.php';
    $.ajax({
        type : 'post',
        dataType:'json', //Specifies that the server returns data in JSON format.
        processData: false, //No processing of sent data (mandatory)
        contentType: false, //No Content-Type headers (required)
        data: formData, //Pass form data as a parameter
        url :url,
        success : function(res){
            if(res.code){
                //alert(res.msg)
                $('.forum-submint-form').trigger("reset");
                window.location.reload()
            }else{
                alert(res.msg)
            }
        }
    })
    return false;
}
function toDislike(forum_id){
    var formData = new FormData(); //create FormData object
    formData.append('act','toDislike');
    formData.append('forum_id',forum_id);
    var url='ajax.php';
    $.ajax({
        type : 'post',
        dataType:'json', //Specifies that the server returns data in JSON format.
        processData: false, //No processing of sent data (mandatory)
        contentType: false, //No Content-Type headers (required)
        data: formData, //Pass form data as a parameter
        url :url,
        success : function(res){
            if(res.code){
                //alert(res.msg)
                $('.forum-submint-form').trigger("reset");
                window.location.reload()
            }else{
                alert(res.msg)
            }
        }
    })
    return false;
}

function read_news(type,forum_id,news_id) {
    var formData = new FormData(); //create FormData object
    formData.append('act','read_news');
    formData.append('forum_id',forum_id);
    formData.append('type',type);
    formData.append('news_id',news_id);
    var url='ajax.php';
    $.ajax({
        type : 'post',
        dataType:'json', //Specifies that the server returns data in JSON format.
        processData: false, //No processing of sent data (mandatory)
        contentType: false, //No Content-Type headers (required)
        data: formData, //Pass form data as a parameter
        url :url,
        success : function(res){
            if(res.code){
                //alert(res.msg)
                //$('.forum-submint-form').trigger("reset");

                window.location.href=type+'.php#'+type+forum_id;
            }else{
                alert(res.msg)
            }
        }
    })
    return false;
}

function read_news_resource(resource_id,review_id,news_id) {
    var formData = new FormData(); //create FormData object
    formData.append('act','read_news_resource');
    formData.append('review_id',review_id);
    formData.append('resource_id',resource_id);
    formData.append('news_id',news_id);
    var url='ajax.php';
    $.ajax({
        type : 'post',
        dataType:'json', //Specifies that the server returns data in JSON format.
        processData: false, //No processing of sent data (mandatory)
        contentType: false, //No Content-Type headers (required)
        data: formData, //Pass form data as a parameter
        url :url,
        success : function(res){
            if(res.code){
                //alert(res.msg)
                //$('.forum-submint-form').trigger("reset");

                window.location.href='content.php?resource='+resource_id+"#"+review_id;
            }else{
                alert(res.msg)
            }
        }
    })
    return false;
}

function addBookmark(user_id, resource_id) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'add_bookmark.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                //alert(response); // Displaying messages returned from the server
                window.location.reload()
            } else {
                alert('Failed to add bookmark. Please try again later.');
            }
        }
    };
    xhr.send('user_id=' + encodeURIComponent(user_id) + '&resource_id=' + encodeURIComponent(resource_id));
}
