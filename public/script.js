
//let ip_address = '127.0.0.1';
//let socket_port = '3000';
//let socket = io(ip_address + ':' + socket_port);
const socket = io();
var correctos = 0;
var incorrectos = 0;
var guardar= {};
var c = 0;
$(document).ready(function(){
    var pieces = createPieces(true);
    $("#puzzleContainer").html(pieces);
    $("#btnStart").click(function(){
        var pieces = $("#puzzleContainer div");
        pieces.each(function(){
            var leftPosition = Math.floor(Math.random()*290) + "px";
            var topPosition = Math.floor(Math.random()*290) + "px";
            $(this).addClass("draggablePiece")
            .css({
                position: "absolute",
                left: leftPosition,
                top: topPosition
            })
            $("#pieceContainer").append($(this));
        });
    
     var emptyString = createPieces(false);
     $("#puzzleContainer").html(emptyString);
     $(this).hide();
     $("#btnReset").show()
     implementLogic()
    });
    
    $("#btnReset").click(function()
    {
       // var a = '<div style="background-image:none;" class="piece droppableSpace ui-droppable piecePresent"><div style="background-position: -200px -100px; position: relative; left: 0px; top: 0px;" class="piece draggablePiece ui-draggable ui-draggable-handle droppedPiece" data-order="6"></div></div><div style="background-image:none;" class="piece droppableSpace ui-droppable"></div><div style="background-image:none;" class="piece droppableSpace ui-droppable"></div><div style="background-image:none;" class="piece droppableSpace ui-droppable"></div><div style="background-image:none;" class="piece droppableSpace ui-droppable"></div><div style="background-image:none;" class="piece droppableSpace ui-droppable piecePresent"><div style="background-position: -100px 0px; position: relative; left: 0px; top: 0px;" class="piece draggablePiece ui-draggable ui-draggable-handle droppedPiece" data-order="1"></div></div><div style="background-image:none;" class="piece droppableSpace ui-droppable"></div><div style="background-image:none;" class="piece droppableSpace ui-droppable"></div><div style="background-image:none;" class="piece droppableSpace ui-droppable"></div><div style="background-image:none;" class="piece droppableSpace ui-droppable piecePresent"><div style="background-position: -200px -200px; position: relative; left: 0px; top: 0px;" class="piece draggablePiece ui-draggable ui-draggable-handle droppedPiece" data-order="10"></div></div><div style="background-image:none;" class="piece droppableSpace ui-droppable"></div><div style="background-image:none;" class="piece droppableSpace ui-droppable"></div><div style="background-image:none;" class="piece droppableSpace ui-droppable"></div><div style="background-image:none;" class="piece droppableSpace ui-droppable"></div><div style="background-image:none;" class="piece droppableSpace ui-droppable"></div><div style="background-image:none;" class="piece droppableSpace ui-droppable"></div>';
        //console.log(a);
       // var newPieces = "<div style='background-position:"+ -100 + "px "+ 0 + "px;' class='piece' data-order="+ 1 + "></div>"
       var newPieces = createPieces(true); 
       $("#puzzleContainer").html(newPieces);
       console.log($("#puzzleContainer").html());
        $(this).hide();
        $("#btnStart").show();
        $("#pieceContainer").empty();

    });
   
    function createPieces(withImage)
    {
        var rows = 4, columns = 4;
        var pieces= ""; 
        for (var i=0,top=0,order=0; i<rows; i++,top-=100)
        {
            
              for(var j=0,left=0; j<columns; j++,left-=100,order++)
             {
                if(withImage)
               {  
                 pieces += "<div id=pieza"+order+" style='background-position:"+ left + "px "+ top + "px;' class='piece' data-order="+ order + "></div>";
                }
               else
          {
            pieces += "<div id=lugar"+order+" style='background-image:none;' class='piece droppableSpace'></div>";
          }
             }
        }
        return pieces;
      
    }
    function checkIfPuzzleSolved()
    {
        if($("#puzzleContainer .droppedPiece").length != 16)
        {
            return false;
        }
        for(var k=0; k<16;k++)
        {
            var item = $("#puzzleContainer .droppedPiece:eq(" + k +")");
            var order = item.data("order");
            if(k != order)
            {
                $("#pieceContainer").text("INTENTALO OTRA VEZ!");
                return false;
            }
        }
        $("#pieceContainer").text("Wow! LO HICISTE!");
        return true;
    }
    function implementLogic(){
        $(".draggablePiece").draggable({
            revert:"invalid",
            start: function(){
                if($(this).hasClass("droppedPiece"))
                {
                    $(this).removeClass("droppedPiece");
                    $(this).parent().removeClass("piecePresent");
                }
            }
        });


        $(".droppableSpace").droppable({
            
            //Resalta la zona donde se va poner la pieza
            hoverClass: "ui-state-highlight",
            //impide que una pieza se ponga donde ya hay una
            accept: function(){
                return !$(this).hasClass("piecePresent")
            },

            drop:function(event,ui)
            {
             var draggableElement = ui.draggable;
             var dragElem = draggableElement.attr("id").toString();
             //console.log(draggableElement[0].outerHTML);

             var droppedOn = $(this);
             var dropElem = droppedOn.attr("id").toString();
             var message = {"0": dragElem, "1":dropElem };
             guardar[c]= message;
             c =c+1;
            // let message = JSON.stringify(strignElem);
             socket.emit('sendChatToServer', message);

                if(draggableElement.attr("id").slice(-1) == droppedOn.attr("id").slice(-1)){
                    correctos = correctos + 1;
                }
                else{
                    console.log("Pieza incorrecta");
                    incorrectos = incorrectos + 1;
                }
             droppedOn.addClass("piecePresent");
             $(draggableElement).addClass("droppedPiece")
             .css({ 
                top:0,
                left:0,
                position:"relative"
             }).appendTo(droppedOn);
                if($("#puzzleContainer .droppedPiece").length == 16){
                $("#acierto").val(correctos.toString());
                $("#fallo").val(incorrectos.toString());
               // $("#incorrectos").innerHTML = incorrectos.toString();
             }
             //console.log("Hello");
            }
        });
        socket.on('sendChatToClient', (message) => {
            console.log(message);
            var p = "#"+ message[0];
                var lugar = "#"+ message[1];
                $(lugar).addClass("piecePresent");
                $(p).addClass("droppedPiece")
                .css({ 
                   top:0,
                   left:0,
                   position:"relative"
                }).appendTo($(lugar));
     });
         
     $("#save").click(function () {
        save();
     });
     $("#abrir").click(function () {
        abrir();
     });
     
     

     
    }
    function load (guard) {
        guard = JSON.parse(guard);
        for (let i in guard) {
              var p = "#"+ guard[i][0];
              console.log(p);
                    var lugar = "#"+guard[i][1];
                    $(lugar).addClass("piecePresent");
                    $(p).addClass("droppedPiece")
                    .css({ 
                       top:0,
                       left:0,
                       position:"relative"
                    }).appendTo($(lugar));
            
          }
     }
     function save(){
        localStorage.setItem("diagrama", JSON.stringify(guardar));
    
    }
    function abrir(){
        dig = localStorage.getItem("diagrama");
        load(dig);
    }
    
   
  
});

