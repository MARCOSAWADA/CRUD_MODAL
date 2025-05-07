
var botao_yes = document.getElementById("yes");
var botao_cadastrar = document.getElementById("cadastrar");
var modal = document.getElementById("modal");
var botao_no = document.getElementById("modal")

function fechaModal(){
    modal.classList.remove('chama');
    modal.classList.add('oculta');
}

function chamaModal(){
    modal.classList.remove('oculta');
    modal.classList.add('chama');
}

botao_cadastrar.addEventListener('click', function(event){

    event.preventDefault();
    chamaModal()
    let formulario = document.getElementById("formulario");

    // 1º 'sem' async
    // botao_yes.addEventListener('click', function(){
    //     alert('Clicou');
    // })
    // ______________________________________________________


    // 2º 'com' async 
    // obs.: abrir pelo localhost=> http://localhost/PrOjEtO/CRUD_MODAL/

    botao_yes.addEventListener('click',async function(event){
        
         let forms = new FormData(formulario);
        //  console.log(forms)
         let dados_php = await fetch('./actions/cadastra_prod.php',{
            method:'POST',
            body: forms
         });

         let response = await dados_php.json();

        //  console.log(response);
         if(response.status == 200){
            alert(response.msg)
            fechaModal()
         }
    })




    // console.log(formulario);
} )

// botao_yes.addEventListener('click', function(){
//     alert('Clicou');
// })

