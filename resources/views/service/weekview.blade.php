@include('layouts.header')

    <style>
      @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700");
      @import url("https://fonts.googleapis.com/css?family=Pacifico");
      body {
        color: #999;
        font-family: "Open Sans", sans-serif;
        font-size: 13px;
        margin: 0;
      }
      body h1 {
        display: block;
        text-align: center;
        font-family: "Pacifico", cursive;
        font-size: 21px;
        margin-bottom: 30px;
      }
      body .holder {
        background-color: #f8f8f8;
        overflow-x: auto;
        min-height: 100vh;
        display: block;
        align-items: center;
      }
      body .overflow {
        display: inline-block;
        padding: 30px;
      }
      body .week {
        display: flex;
      }
      body .week .day {
        background-color: #fff;
        border: 1px solid #ddd;
        margin-left: -1px;
        min-width: 345px;
        padding: 30px 0;
      }
      body .twenty_four_hours {
        text-align: center;
      }
      body .section {
        margin: 15px 0 5px;
      }
      body .section + .hour {
        margin-left: -18px;
      }
      body .hour {
        display: inline-block;
      }
      body .circle {
        width: 36px;
        height: 36px;
        border: 1px solid #ddd;
        border-radius: 18px;
        background: #fff;
        display: flex;
        font-size: 11px;
        align-items: center;
        justify-content: center;
        margin-right: 3px;
        cursor: pointer;
        transition: 0.15s all ease-in-out;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      body .circle + .circle {
        margin-left: 21px;
        margin-right: -21px;
        position: relative;
      }
      body .circle:hover {
        background: #f8f8f8;
      }
      body .circle.selected {
        background: #38868e;
        border-color: #2f6f76;
        color: #fff;
      }
    </style>

  
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click"
data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: navbar-->
    @include('layouts.navbar')
    <!-- END navbar -->

    <!-- BEGIN LAYOUT -->
    @include('layouts.layout')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <div class="holder"> 
                    <div class="overflow">
                        <div class="week">
                        <div class="day"> 
                            <h1>Monday</h1>
                            <div class="twenty_four_hours">
                            <div class="section">Morning</div>
                            <div class="hour">
                                <div class="circle">6</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">7</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">8</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">9</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">10</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">11</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Afternoon</div>
                            <div class="hour">
                                <div class="circle">12</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">1</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">2</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">3</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">4</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">5</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Evening</div>
                            <div class="hour">
                                <div class="circle">6</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">7</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">8</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">9</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">10</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">11</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Night</div>
                            <div class="hour">
                                <div class="circle">12</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">1</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">2</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">3</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">4</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">5</div>
                                <div class="circle">30</div>
                            </div>
                            </div>
                        </div>
                        <div class="day"> 
                            <h1>Tuesday</h1>
                            <div class="twenty_four_hours">
                            <div class="section">Morning</div>
                            <div class="hour">
                                <div class="circle">6</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">7</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">8</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">9</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">10</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">11</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Afternoon</div>
                            <div class="hour">
                                <div class="circle">12</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">1</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">2</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">3</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">4</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">5</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Evening</div>
                            <div class="hour">
                                <div class="circle">6</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">7</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">8</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">9</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">10</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">11</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Night</div>
                            <div class="hour">
                                <div class="circle">12</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">1</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">2</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">3</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">4</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">5</div>
                                <div class="circle">30</div>
                            </div>
                            </div>
                        </div>
                        <div class="day"> 
                            <h1>Wednesday</h1>
                            <div class="twenty_four_hours">
                            <div class="section">Morning</div>
                            <div class="hour">
                                <div class="circle">6</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">7</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">8</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">9</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">10</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">11</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Afternoon</div>
                            <div class="hour">
                                <div class="circle">12</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">1</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">2</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">3</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">4</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">5</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Evening</div>
                            <div class="hour">
                                <div class="circle">6</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">7</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">8</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">9</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">10</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">11</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Night</div>
                            <div class="hour">
                                <div class="circle">12</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">1</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">2</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">3</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">4</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">5</div>
                                <div class="circle">30</div>
                            </div>
                            </div>
                        </div>
                        <div class="day"> 
                            <h1>Thursday</h1>
                            <div class="twenty_four_hours">
                            <div class="section">Morning</div>
                            <div class="hour">
                                <div class="circle">6</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">7</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">8</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">9</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">10</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">11</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Afternoon</div>
                            <div class="hour">
                                <div class="circle">12</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">1</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">2</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">3</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">4</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">5</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Evening</div>
                            <div class="hour">
                                <div class="circle">6</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">7</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">8</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">9</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">10</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">11</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Night</div>
                            <div class="hour">
                                <div class="circle">12</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">1</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">2</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">3</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">4</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">5</div>
                                <div class="circle">30</div>
                            </div>
                            </div>
                        </div>
                        <div class="day"> 
                            <h1>Friday</h1>
                            <div class="twenty_four_hours">
                            <div class="section">Morning</div>
                            <div class="hour">
                                <div class="circle">6</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">7</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">8</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">9</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">10</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">11</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Afternoon</div>
                            <div class="hour">
                                <div class="circle">12</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">1</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">2</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">3</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">4</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">5</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Evening</div>
                            <div class="hour">
                                <div class="circle">6</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">7</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">8</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">9</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">10</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">11</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Night</div>
                            <div class="hour">
                                <div class="circle">12</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">1</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">2</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">3</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">4</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">5</div>
                                <div class="circle">30</div>
                            </div>
                            </div>
                        </div>
                        <div class="day"> 
                            <h1>Saturday</h1>
                            <div class="twenty_four_hours">
                            <div class="section">Morning</div>
                            <div class="hour">
                                <div class="circle">6</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">7</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">8</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">9</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">10</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">11</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Afternoon</div>
                            <div class="hour">
                                <div class="circle">12</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">1</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">2</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">3</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">4</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">5</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Evening</div>
                            <div class="hour">
                                <div class="circle">6</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">7</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">8</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">9</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">10</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">11</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Night</div>
                            <div class="hour">
                                <div class="circle">12</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">1</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">2</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">3</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">4</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">5</div>
                                <div class="circle">30</div>
                            </div>
                            </div>
                        </div>
                        <div class="day"> 
                            <h1>Sunday</h1>
                            <div class="twenty_four_hours">
                            <div class="section">Morning</div>
                            <div class="hour">
                                <div class="circle">6</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">7</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">8</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">9</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">10</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">11</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Afternoon</div>
                            <div class="hour">
                                <div class="circle">12</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">1</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">2</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">3</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">4</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">5</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Evening</div>
                            <div class="hour">
                                <div class="circle">6</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">7</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">8</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">9</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">10</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">11</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="section">Night</div>
                            <div class="hour">
                                <div class="circle">12</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">1</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">2</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">3</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">4</div>
                                <div class="circle">30</div>
                            </div>
                            <div class="hour">
                                <div class="circle">5</div>
                                <div class="circle">30</div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('layouts.footer')
    <!-- END: Footer-->
    
    <script>
      $(".circle").on("click", function(e) {
      if (e.shiftKey){
        var active = $(".circle.active");
        var $this = $(this);
        if (active.hasClass("selected")) {
          if (active.next().hasClass("circle")) {
            active.next().addClass("selected");
          }
          if ($this.prev().hasClass("circle")) {
            $this.prev().addClass("selected");
          }
          active.parent().nextUntil($this.parent()).find(".circle").addClass("selected");
        } else {
          if (active.next().hasClass("circle")) {
            active.next().removeClass("selected");
          }
          if ($this.prev().hasClass("circle")) {
            $this.prev().removeClass("selected");
          }
          active.parent().nextUntil($this.parent()).find(".circle").removeClass("selected");
        }
      }
      $(".circle").removeClass("active");
      $(this).addClass("active");
      $(this).toggleClass("selected");
    });
    </script>
  </body>

