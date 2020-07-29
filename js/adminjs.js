function hide_info(){
  document.getElementById("info_tab").style.display = "none";
}

function hide_add_driver(){
  document.getElementById("add_driver_tab").style.display = "none";
}

function hide_add_vehicle(){
  document.getElementById("add_vehicle_tab").style.display = "none";
}

function show_info(){
  x = document.getElementById("info_tab");
  if (x.style.display === "none") {
    x.style.display = "block";
    hide_add_driver();
    hide_add_vehicle();
  }
}

function show_add_driver(){
  x = document.getElementById("add_driver_tab");
  if (x.style.display === "none") {
    x.style.display = "block";
    hide_info();
    hide_add_vehicle();
  }
}

function show_add_vehicle(){
  x = document.getElementById("add_vehicle_tab");
  console.log(add_vehicle_tab);
  console.log(document.getElementById("add_vehicle_tab").style.display);
  if (x.style.display === "none") {
    x.style.display = "block";
    hide_add_driver();
    hide_info();
  }
}
