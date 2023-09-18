<div class="tab">
    <button class="tablinks" onmouseover="openHour(event, 'Hour')">Hour</button>
    <button class="tablinks" onmouseover="openHour(event, 'kwH')">kW</button>
  </div>
  


<style>
    .tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  
}

/* Style the buttons that are used to open the tab content */
.tab button {
  display: inline-flex;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

</style>




<script>
  function openHour(evt, cityHour) {
    // Declare all variables
    var i, tabcontent, tablinks;
  
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
     // Get all elements with class="tablinks" and remove the class "active"
     tablinks = document.getElementsByClassName("tablinks");
     for (i = 0; i < tablinks.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
            
     // Show the current tab, and add an "active" class to the link that opened the tab
     document.getElementById(cityHour).style.display = "block";
     evt.currentTarget.className += " active";
      } 
     </script>
  