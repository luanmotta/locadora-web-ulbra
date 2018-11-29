<style>
   * {
        box-sizing: border-box;
      }
      
      body {
        font: 16px Arial;  
      }
      
      .autocomplete {
        /*the container must be positioned relative:*/
        position: relative;
        display: inline-block;
      }
      
      input[type="text"] {
        border: 1px solid transparent;
        background-color: #f1f1f1;
      }
      
      input[type=text] {
        background-color: #f1f1f1;
      }
      
      input[type=submit] {
        background-color: DodgerBlue;
        color: #fff;
        cursor: pointer;
      }
      
      .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
      }
      
      .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff; 
        border-bottom: 1px solid #d4d4d4; 
      }
      
      .autocomplete-items div:hover {
        /*when hovering an item:*/
        background-color: #e9e9e9; 
      }
      
      .autocomplete-active {
        /*when navigating through the items using the arrow keys:*/
        background-color: DodgerBlue !important; 
        color: #ffffff; 
      }
      </style>

<center>
   <form action="inserido.php" method="post">
      <table style="width: 600px" border='1'>
         <tr>
            <td>
               <span>Cliente:</span>
               <select idate="cliente" name="cliente">
                  <option value="0">Selecione um cliente</option>
                  <?php
                        require("../conecta.inc.php");
                        $ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
                        $resultado=mysqli_query($ok, "Select * from cliente order by nome") or die ("Nao foi possivel consultar cidades.");
                        while ($linha=mysqli_fetch_array($resultado)) {
                        $clienteId=$linha["clienteId"];
                        $nome=$linha["nome"];
                        print("<option value='$clienteId'>$nome</option>");
                        }
                     ?>
               </select><br>
            </td>
            <td>
               <span style="margin-left: 10px">Pesquisar filme: </span>
               <div class="autocomplete">
                  <input type="text" name="pesquisar" id="pesquisar">
               </div>
            </td>

         </tr>
         <tr>
            <th>Filme</th>
            <th>Valor</th>
            <th>Acao</th>
         </tr>
      </table>
      <div style="display: flex; justify-content: center"><input style="margin-top: 10px" type="submit" value="Criar Pedido"></div>
   </form>
   <p><a href="mostra.php">Voltar</a>
</center>

<script>
   function deletar(id){
      const tr = document.getElementById(id);
      tr.parentNode.removeChild(tr);
   }

   function autocomplete(inp, arr) {
      function click() {
         const table = document.querySelector("table tbody");
         const html = [];
         html.push(`<tr id="${this.children[1].value}">`);
         html.push(`<td>${this.textContent}</td>`);
         html.push(`<td>${this.dataset.valor}</td>`);
         html.push(`<input data-name='${this.textContent}' id="filmes[]" name="filmes[]" type='hidden' value='${this.children[1].value}'>`)
         html.push(`<td onClick="deletar(${this.children[1].value})"><a href="#">Deletar</a></td>`);
         html.push("</tr>");
         table.insertAdjacentHTML("beforeend", html.join(""))
      }

      /*the autocomplete function takes two arguments,
      the text field element and an array of possible autocompleted values:*/
      var currentFocus;
      /*execute a function when someone writes in the text field:*/
      inp.addEventListener("input", function (e) {
         var a, b, i, val = this.value;
         /*close any already open lists of autocompleted values*/
         closeAllLists();
         if (!val) { return false; }
         currentFocus = -1;
         /*create a DIV element that will contain the items (values):*/
         a = document.createElement("DIV");
         a.setAttribute("id", this.id + "autocomplete-list");
         a.setAttribute("class", "autocomplete-items");
         /*append the DIV element as a child of the autocomplete container:*/
         this.parentNode.appendChild(a);
         /*for each item in the array...*/
         for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].nome.substr(0, val.length).toUpperCase() == val.toUpperCase()) {
               /*create a DIV element for each matching element:*/
               b = document.createElement("DIV");
               b.setAttribute("class", "item-list");
               b.setAttribute("data-valor", arr[i].valor);
               b.addEventListener("click", click)
               /*make the matching letters bold:*/
               b.innerHTML = "<strong>" + arr[i].nome.substr(0, val.length) + "</strong>";
               b.innerHTML += arr[i].nome.substr(val.length);
               /*insert a input field that will hold the current array item's value:*/
               b.innerHTML += "<input type='hidden' value='" + arr[i].filmeId + "'>";
               /*execute a function when someone clicks on the item value (DIV element):*/
               b.addEventListener("click", function (e) {
                  /*insert the value for the autocomplete text field:*/
                  debugger
                  inp.value = this.getElementsByTagName("input")[0].innerText;
                  /*close the list of autocompleted values,
                  (or any other open lists of autocompleted values:*/
                  closeAllLists();
               });
               a.appendChild(b);
            }
         }
      });
      /*execute a function presses a key on the keyboard:*/
      inp.addEventListener("keydown", function (e) {
         var x = document.getElementById(this.id + "autocomplete-list");
         if (x) x = x.getElementsByClassName("item-list");
         if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
         } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
         } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
               /*and simulate a click on the "active" item:*/
               if (x) x[currentFocus].click();
            }
         }
      });
      function addActive(x) {
         /*a function to classify an item as "active":*/
         if (!x) return false;
         /*start by removing the "active" class on all items:*/
         removeActive(x);
         if (currentFocus >= x.length) currentFocus = 0;
         if (currentFocus < 0) currentFocus = (x.length - 1);
         /*add class "autocomplete-active":*/
         x[currentFocus].classList.add("autocomplete-active");
      }
      function removeActive(x) {
         /*a function to remove the "active" class from all autocomplete items:*/
         for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
         }
      }
      function closeAllLists(elmnt) {
         /*close all autocomplete lists in the document,
         except the one passed as an argument:*/
         var x = document.getElementsByClassName("autocomplete-items");
         for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
               x[i].parentNode.removeChild(x[i]);
            }
         }
      }
      /*execute a function when someone clicks in the document:*/
      document.addEventListener("click", function (e) {
         closeAllLists(e.target);
      });
   }

   function pesquisar() {
      const txt = document.getElementById("pesquisar").value;
      const url = `http://localhost:8080/Locadora/pedido/pesquisarFilme.php?pesquisar=${txt}`;

      window.fetch(url)
         .then(res => res.json())
         .then(data => {
            console.log(data);
            autocomplete(document.getElementById("pesquisar"), data);
         })
         .catch(err => {
         });
   }

   window.addEventListener('load', function () {
      const btn = document.getElementById("pesquisar");
      btn.addEventListener("keypress", pesquisar);
   })



</script>