window.addEventListener("load", function(){

    //store the tab variables
    var tabs = this.document.querySelectorAll("ul.nav-tabs > li");

    //loops through all the tabs and looks for when each tab is clicked then calls the switchTab function
    for(i = 0; i < tabs.length; i++)
    {
        tabs[i].addEventListener("click", switchTab);
    }

    function switchTab(event)
    {
        event.preventDefault();//this stops the adding of tab names to the url

        //when a tab is clicked this removes the active class from any tab that currently has it
        document.querySelector("ul.nav-tabs li.active").classList.remove("active");
        document.querySelector(".tab-pane.active").classList.remove("active");

        //this assigns the active class to the tab that is clicked
        var clickedTab = event.currentTarget;
        var anchor = event.target;
        var activePaneID = anchor.getAttribute("href");

        clickedTab.classList.add("active");

        document.querySelector(activePaneID).classList.add("active");//makes the selected pane active


    }
});