/*=============== SHOW MENU ===============*/
/*
const showMenu = (toggleId, navId) =>{
    const toggle = document.getElementById(toggleId),
          nav = document.getElementById(navId)
 
    toggle.addEventListener('click', () =>{
        toggle.classList.toggle('show-icon')
        // Add show-menu class to nav menu
        nav.classList.toggle('show-menu')
 
        // Add show-icon to show and hide the menu icon
        
    })
 }
 
showMenu('nav-toggle','nav-menu')
*/

function openMenu() {
    const parent = document.querySelector('.mobile-header');
    const elm = document.querySelector('.dropdown-menu');
    const menuIconElm = document.querySelector('.mobile-header-dropdown'); 
    const brandLogin = document.querySelector('.brand-login');
    const free = document.querySelector('.mobile-header-free');
    const img = document.querySelector('.mobile-header-logo');

    // close
    if(menuIconElm.className.indexOf('open') !== -1) {
        menuIconElm.className = 'mobile-header-dropdown'
        elm.style.top = '-1000%';
        brandLogin.style.opacity = 0;
        if(free.parentElement.className.indexOf('hasLogin') !== -1) {
            free.style.display = 'block'
            /*free.style.opacity = 1*/
            img.classList.remove('animate');
        } else {
            /*free.style.opacity = 1*/
            free.style.display = 'block'
            img.classList.remove('animate');
        }
        
    } else{
        console.log('666')
        menuIconElm.className = 'mobile-header-dropdown open'
        elm.style.top = parent.clientHeight + 'px';
        brandLogin.style.opacity = 1;
        /*free.style.opacity = 0*/
        free.style.display = 'none'
        img.classList.add('animate');
        if(free.parentElement.className.indexOf('hasLogin') !== -1) {
            free.style.display = 'none'
            /*free.style.opacity = 0*/
            img.classList.add('animate');
        } 
        // else {
        //     free.style.opacity = 0
        // }
    }
    
}

/*=============== Wall===============*/
/*change the wall picture */
const wall = document.querySelector('.wall');
let currentIndex = 0;

function wallsc(direction) {
    const itemWidth = document.querySelector('.wall-item').offsetWidth;
    currentIndex = (currentIndex + direction + wall.children.length) % wall.children.length;
    const transformValue = -currentIndex * itemWidth + 'px';
    wall.style.transform = 'translateX(' + transformValue + ')';
}
/**click the div box turn into url link */
function canvasTo(url) {
    window.location.href = url;
}
  /**back to last page button */
function backtolast(){
    window.history.back();
}
function updateURL(){
    var sortByValue = document.getElementById('sortBy').value;
    if (sortByValue!='all'){
        window.location.href = 'modules.php?sortBy=' + sortByValue;
    }else{
        window.location.href = 'modules.php';
    }
    
}
/**show the module level2 by module level1 */
function choosemodule() {
    // console.log(111)
    //manually show
    // var module_level1 = document.getElementById('module_level1');
    // var Language_container = document.getElementById('Language_container');
    // var Mathematics_container = document.getElementById('Mathematics_container');
    // var Science_container = document.getElementById('Science_container');
    // var Social_Science_container = document.getElementById('Social_Science_container');

    // if (module_level1.value === 'Language') {
    //     Language_container.classList.remove('hidden');
    //     Mathematics_container.classList.add('hidden');
    //     Science_container.classList.add('hidden');
    //     Social_Science_container.classList.add('hidden');
    // } else if (module_level1.value === 'Mathematics') {
    //     Language_container.classList.add('hidden');
    //     Mathematics_container.classList.remove('hidden');
    //     Science_container.classList.add('hidden');
    //     Social_Science_container.classList.add('hidden');
    // } else if (module_level1.value === 'Science') {
    //     Language_container.classList.add('hidden');
    //     Mathematics_container.classList.add('hidden');
    //     Science_container.classList.remove('hidden');
    //     Social_Science_container.classList.add('hidden');
    // } else if (module_level1.value === 'Social_Science'){
    //     Language_container.classList.add('hidden');
    //     Mathematics_container.classList.add('hidden');
    //     Science_container.classList.add('hidden');
    //     Social_Science_container.classList.remove('hidden');
    // }


    //auto show
    var url='ajax.php';
    var formData = new FormData(); //create FormData object
    var module_level1 = document.getElementById('module_level1');
    var mod_id=module_level1.value;
    formData.append('act','getm');
    formData.append('mod_id',mod_id);
    $.ajax({
        type : 'post',
        dataType:'json', //Specifies that the server returns data in JSON format.
        processData: false, //No processing of sent data (mandatory)
        contentType: false, //No Content-Type headers (required)
        data: formData, //Pass form data as a parameter
        url :url,
        success : function(res){
            if(res.length){
                var html='<option value="">module level 2:</option>';
                for (let index = 0; index < res.length; index++) {
                    
                    html+='<option value="'+res[index].moduleL2_id+'">'+res[index].module_name+'</option>';
                }
                
                $("#leo_module_level2").show();
                $("#lesssmodule_level2").html(html)
                
            }else{
                var html='<option value="0">module level 2:</option>';
                $("#leo_module_level2").hide();
                $("#lesssmodule_level2").html(html)
            }
        }
    })
}

/**show the input by input type */
function toinput() {
    //console.log(1111133333333)
    var resource_type = document.getElementById('resource_type');
    var file_input_container = document.getElementById('file_input_container');
    var text_input_container = document.getElementById('text_input_container');
    var link_input_container = document.getElementById('link_input_container');
    //console.log(resource_type.value)
    // Different input boxes are displayed depending on the selection of the drop-down box.
    if (resource_type.value === '1') {
        file_input_container.classList.remove('hidden');
        text_input_container.classList.add('hidden');
        link_input_container.classList.add('hidden');
        text_input.value = '';
        linkInput.value = '';
        chooseFileName(); //call again to clear the file name cause when choose other input type the input will be clear
    } else if (resource_type.value === '2') {
        file_input_container.classList.add('hidden');
        text_input_container.classList.remove('hidden');
        link_input_container.classList.add('hidden');
        linkInput.value = '';
        file_input.value = '';
    } else if (resource_type.value === '3') {
        file_input_container.classList.add('hidden');
        text_input_container.classList.add('hidden');
        link_input_container.classList.remove('hidden');
        text_input.value = '';
        file_input.value = '';
    }
}

/**show file name which choose by file input */
function chooseFileName(){
    var file_input = document.getElementById('file_input');
    var fileNameSpan = document.getElementById('fileName');

    if (file_input.files.length > 0) {
      fileNameSpan.textContent = file_input.files[0].name;
    } else {
      fileNameSpan.textContent = '';
    }
}
// document.getElementById('cancelButton').addEventListener('click', function() {
//     window.location.href = 'index.php';
//   });

//check the login status for menthion user to login:
function checkAndRedirect(url) {
    // send AJAX request to check login status:
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'check_login.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.logged_in) {
                    // if has login jump to page:
                    window.location.href = url;
                } else {
                    // never login menthion user to login: 
                    alert('Please Login');
                    //window.location.href = "../login-page/login.php";
                }
            } else {
                //if has error
                alert('There was an error in the request. Please try again later.');
            }
        }
    };
    xhr.send();
}


// Updates the currently selected user type when the drop-down menu selection changes
function updateSelectedUserType() {
    // Getting dropdown menu elements
    var selectElement = document.getElementById('userTypeSelect');

    // Get the index of the currently selected option
    var selectedIndex = selectElement.selectedIndex;

    // Get the text content of the currently selected option (user type)
    var selectedUserType = selectElement.options[selectedIndex].text;

}

//remove item by resource_id
function removeItem(id,type) {
    // Send an AJAX request to the server
    console.log(id);
    console.log(type);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'delet.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Request successful, process returned data
                var response = xhr.responseText;
                //alert(response); // Displaying messages returned from the server(delet.php)
                window.location.reload();
            } else {
                // Request failed, error message displayed
                var response = xhr.responseText;
                alert(response);
                //alert('Deletion Failed, Please try again later.');
                window.location.reload();
            }
        }
    };
    // Send a request and pass parameters
    console.log('id='+ encodeURIComponent(id) + '&type=' + encodeURIComponent(type));
    xhr.send('id='+ encodeURIComponent(id) + '&type=' + encodeURIComponent(type)); 
    
}
