<?php

if(!isset($_SESSION["user"])){
    header("Location: ../../../DiaGenKri/public/home");
}
?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <title>Visualisation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <script src="../../../DiaGenKri/app/res/js/raphael/raphael.min.js"></script>
    <script src="../../../DiaGenKri/app/res/js/raphael/raphael.json.js"></script>

    <script type="text/javascript" src="../../../DiaGenKri/app/res/js/david/raphael.pan-zoom.js"></script>
    <!-- <script type="text/javascript" src="../../../DiaGenKri/app/res/js/nermin/nermin.js"></script> -->
    <script type="text/javascript" src="../../../DiaGenKri/app/res/js/david/david.js"></script>
    <script type="text/javascript" src="../../../DiaGenKri/app/res/js/nermin/test.js"></script>

    <link rel="stylesheet" href="../../../DiaGenKri/app/res/css/main.css">

</head>

<?php

// Temporary - to  be loaded from DB
$name = "Untitled diagram";
$description="";


?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../../../DiaGenKri/public/home">DiaGenKri</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION["user"])): ?>
                    <li><a href="../../../DiaGenKri/public/administrate"><span class="glyphicon glyphicon-cog"></span> Administrate</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span> 
                            <strong><?php
                                echo $_SESSION["user-name"];
                                ?>
                            </strong>
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="navbar-login">
                                    <div class="row">
                                        <div class="col-lg-4" id="login-size">
                                            <p class="text-center">
                                                <span class="glyphicon glyphicon-user icon-size"></span>
                                            </p>
                                        </div>
                                        <div class="col-lg-8" id="login-size">
                                            <p class="text-left"><strong><?php
                                                    echo $_SESSION["user-name"] . " " . $_SESSION["user-surname"];
                                                    ?>
                                                </strong></p>
                                            <p class="text-left small"><?php
                                                echo $_SESSION["user"];
                                                ?>
                                            </p>
                                            <p class="text-left">
                                                <a href="../../../DiaGenKri/public/profile" class="btn btn-primary btn-block btn-sm">My profile</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="navbar-login navbar-login-session">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p>
                                                <a href="logIn/logOutUser/" class="btn btn-danger btn-block">Log out</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li><a href="../../../DiaGenKri/public/logIn"><span class="glyphicon glyphicon-user"></span> Log in</a></li>
                    <li><a href="../../../DiaGenKri/public/register"><span class="glyphicon glyphicon-log-in"></span> Registration</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid text-center" id="main-container">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <h2>Toolbar</h2>
            <button type="button" data-toggle="modal" data-target="#helpModal" id = "help_btn" class="btn btn-info">Help</button><br><br>
            <div class="well well-sm">
                <a ondragstart="startDrag(event)" draggable="true"  id="aSquare" href="javascript:void(0);" style="overflow: hidden; width: 80px; height: 60px; padding: 1px; display: inline-block; cursor: move">
                    <svg class="draggable" id="svgtag"  style="width: 80px; height: 60px; display: block; position: relative; overflow: hidden; left: 2px; top: 2px">
                        <g>
                            <g></g>
                            <g>
                                <g transform="translate(2,10)" style="visibility: visible;">
                                    <rect id="rectID"  class="draggable" height="30" width="70" fill="#ffffff" stroke="#000000" pointer-events="all"></rect>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>
                <br>
                <a ondragstart="startDrag(event)" draggable="true"  id="aDecision" href="javascript:void(0);" style="overflow: hidden; width: 80px; height: 60px; padding: 1px; display: inline-block; cursor: move">
                    <svg class="draggable" id="svgtag"  style="width: 80px; height: 60px; display: block; position: relative; overflow: hidden; left: 2px; top: 2px">
                        <g>
                            <g></g>
                            <g>
                                <g transform="translate(35, 5)" style="visibility: visible;">
                                    <rect id="rhombusID" transform="rotate(45)" class="draggable" height="35" width="35" fill="#ffffff" stroke="#000000" pointer-events="all"></rect>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>
            </div>

            <div class="well well-sm">
                <button onclick="addConnection()" id = "add_connection_button" class="btn btn-block btn-success">Add connection</button>
            </div>

            <div class="well well-sm">
                <button onclick="setDeleteConnection()" id = "delete_connection_button" class="btn btn-block btn-warning">Delete connection</button>
            </div>

            <div class="well well-sm">
                <button onclick="setDeleteShape()" id = "delete_shape_button" class="btn btn-block btn-warning">Delete vertex</button>
            </div>

            <div class="well well-sm">
                <button type="button" data-toggle="modal" data-target="#metaData" id = "edit_description" class="btn btn-block btn-info">Edit description</button>
            </div>
            <div class="well well-sm">
                <button type="button" onclick="setModal()" id = "test_modal" class="btn btn-block btn-info">TEST</button>
            </div>

            <!---<div class="well well-sm">
                <button id="save" onclick="saveGraph()" type="button" class="btn btn-block btn-success">Save</button>
            <!---<a href="../../../DiaGenKri/public/visualisation" type="button" class="btn btn-danger row-increased-bottom">Cancel</a>--->
            <!---    <button id="load" onclick="loadGraph()" type="button" class="btn btn-block btn-success">Load</button>
            </div>--->

        </div>
        <div onclick="looseFocus(event)" ondrop="mainDraw(event)" class="col-sm-8" id="content">
        </div>
        <div id="mapControls"><a id="up" href="javascript:void(0)"></a><a id="down" href="javascript:void(0)"></a></div>

        <div class="col-sm-2 sidenav">

            <h2>Settings</h2>
            <form>
                <label class="myLabelForm" for="IDinput">Element ID</label></br>
                <input class="myInputForm" id="IDinput" disabled type="text" name="fname"><br>
                <label class="myLabelForm" for="IDtext">Text (short)</label></br>
                <input class="myInputForm"disabled id="IDtext" type="text" maxlength="20"></br>
                <label class="myLabelForm" for="IDdesc">Text (long)</label></br>
                <textarea class="myInputForm" rows="6" cols="20" disabled id="IDdesc" type="text"></textarea>
            </form>
        </div>
    </div>
</div>

<!-- Modal Long text -->
<div class="modal fade" id="longText" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="h4ID" class="modal-title">
                    Detailed node description
                    <!---<script>document.getElementById('h4ID').innerText=document.getElementById('IDtext').value</script>--->
                </h4>
            </div>
            <div class="modal-body">
                <pre><span style="word-wrap: break-word" id="descText"></span></pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal graph description (metadata) -->
<div class="modal fade" id="metaData" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit graph information</h4>
            </div>
            <div class="modal-body modal-body-graph">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label  class="col-sm-2 control-label"
                                for="graphName">Graph name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   id="graphName" placeholder="Graph name"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"
                               for="graphDescritption" >Graph description</label>
                        <div class="col-sm-10">
                            <pre><textarea class="form-control"
                                   id="graphDescritption" placeholder="Graph description" rows="6" cols="20" id="graphDescritption" type="text"></textarea></pre>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"
                               for="graphType" >Graph type</label>
                        <div class="col-sm-10">
                            <div>
                                <label class="radio-inline" for="typeVisual"><input class="radio" id="typeVisual" type="radio" name="gType" value="visual">Visual</label>
                            </div>
                            <div>
                                <label class="radio-inline" for="typeDiagnostic"><input class="radio" type="radio" id="typeDiagnostic" name="gType" value="diagnostic">Diagnostic</label>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="sel2">Algorithm type (ctrl+click to select multiple types)</label>
                        <div class="col-sm-10">
                            <select multiple class="form-control" id="sel2">
                                <option id="opt1">Diagnostic</option>
                                <option id="opt2">Treatment</option>
                                <option id="opt3">???</option>
                                <option id="opt4">...</option>
                            </select>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-save-graph" type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                <button id="modal-cancel-graph" type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal help -->
<div class="modal fade" id="helpModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 align="center" class="modal-title">ViDis help</h2>
            </div>
            <div class="modal-body modal-body-graph">
                <div id="top" class="well well-sm">
                    <h3>General information</h3>
                    <p>The ViDis application is used to construct and visualise diagnostic algorithms.
                       The algorithms are constructed in a form of directed graphs.
                       The comments below will help you understand how to use the provided tools.
                    </p>
                </div>
                <div class="well well-sm">
                    <h3>Drawing canvas</h3>
                    <p>
                        The drawing canvas is our main drawing area. We can drag elements onto it from the 'Tool bar'
                        by clicking and dragging them over the grid and then dropping them, all this is done with the
                        left mouse button.<br>
                        <h4>Dragging</h4>
                        Dragging elements on the canvas is done by clicking and holding on an elements with the left mouse button
                        and then moving the mouse around. Simpli let go of the mouse button to release the element at the desired location.
                        <h4>Scrolling</h4>
                        The canvas supports scrolling up, down left and right. The up/down scroll is done with the mouse wheel, make sure
                        the mouse is over the canvas area and rotate the mouse wheel to scroll the canvas area.
                        The left/right scroll is done by holding <b>shift + rotating the mouse wheel</b>.<br>
                        <h4>Zooming</h4>
                        The canvas also supports zooming in and out. This scales the elements and makes it easier to view a larger area of the
                        canvas or to close-up on details in the algorithm. To use the zoom function, hold <b>ctrl + scroll  with the mouse wheel</b>.
                    </p>
                </div>
                <div class="well well-sm">
                    <h3>Nodes</h3>
                    <p>
                        There are two basic node types. The first is the general rectangle node that holds information about certain parts of the algorithm,
                        the second rhombus node is a decision node, it visualises different flows of the algorithm based on certain parameters.<br>
                        <h4>Rectangle node</h4>
                        In the middle lies a short description, which is visible on the canvas and can hold up to 40 characters.
                    The node contains a longer text area, which is visible in a modal window. In the top left corner is a <b>+</b> (plus)
                    sign, that controlls the visibility of connections and child nodes.
                        <ul>
                            <li>
                                <h5>Clicking once</h5>
                                Clicking once on the node surface...
                            </li>
                            <li>
                                <h5>Clicking twice</h5>
                                ...
                            </li>
                            <li>
                                <h5>Plus sign</h5>
                                ...
                            </li>
                            <li>
                                <h5>Short text</h5>
                                ...
                            </li>
                        </ul>
                        <h4>Rhombus node</h4>
                        ...
                        <ul>
                            <li>
                                <h5>Clicking once</h5>
                                ...
                            </li>
                            <li>
                                <h5>Clicking twice</h5>
                                ...
                            </li>
                            <li>
                                <h5>Short text</h5>
                                ...
                            </li>
                        </ul>

                    </p>

                </div>
                <div class="well well-sm">
                    <h3>Connections</h3>
                </div>
                <div class="well well-sm">
                    <h3>Deleting elements</h3>
                </div>

            </div>
            <div class="modal-footer">
                <a href="#top" style="text-align: left">To top</a>
                <button id="help-close" type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal TEST -->
<div class="modal fade" id="testmodal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">TEST modal for disease diagnosing</h4>
            </div>
            <div class="modal-body">
                <h3 id="h3id"></h3>
                <div id="testdiv">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<footer class="container-fluid text-center fixed_bottom">
    <p>©DiaGenKri</p>
</footer>