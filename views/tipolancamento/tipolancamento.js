$( document ).ready(function() {
           
    $('#seq').hide();
    $('#btnEdit').hide();

});

function tpLanc(){
    document.querySelector('#btnInc').addEventListener("click", function(){
        var dados = document.getElementById('txtdesc').value
        
        if(document.getElementById('txtdesc') == "" || document.getElementById('txtdesc') == null){
            alert("Preencha o campo Descrição")
        }else{
            axios.post(`${BASEURL}` + "tipolancamento/tpLanc", {"dados": dados}).then(res=>{
                if(res.data.codigo == 1){
                    alert(res.data.texto);
                    lista();
                }
                else if(res.data.codigo == 0){
                    alert(res.data.texto);
                }
            })
        }
    })
}
tpLanc()

function loadData(id){
    axios.post(`${BASEURL}tipolancamento/loadData/${id}`).then(res=>{
        if(res.data.length > "0"){
            var txtdesc=document.querySelector("#txtdesc");
            var seq=document.querySelector("#seq");

                txtdesc.value = res.data[0].descricao;
                txtdesc.dispatchEvent(new Event('change'));

                seq.value = res.data[0].sequencia;
                seq.dispatchEvent(new Event('change'));
                //activateLabel(document.querySelector("label[for='txtdesc']"));

                //showEdit();
                $('#btnEdit').show();
        }
    });
}   

function delData(id){
    if(confirm("Confirma a Exclusão do Registro?")){
        var params={id};
        axios.post(`${BASEURL}` + "tipolancamento/del",params).then(res=>{	  
            console.log(res.data)
             if(res.data.codigo=="1"){
                alert(res.data.texto);
                lista();
                return;
            }else{
                alert(res.data.texto);
                return;
            }
        });
        }
}

function lista(){
    document.querySelector("#lstplanc").innerHTML="";
    axios.post(`${BASEURL}`+ "tipolancamento/lista").then(res=>{
         var txt=""
             for(var i = 0; i< res.data.length; i++){
                 var reg=res.data[i];
                 var bEdit =`<a href='javascript:void(0)' onclick='loadData(${reg.sequencia});' ><i class="fas fa-edit"></i></a>`
                 var bDel= `<a href='javascript:void(0)' onclick='delData(${reg.sequencia});'><i class="fas fa-trash"></i></a>`
                 txt+=`<tr><td>${reg.descricao}</td><td>${bEdit}</td><td>${bDel}</td></tr>`
             }
             document.querySelector("#lstplanc").innerHTML=txt
    })
}
lista()

document.querySelector("#btnEdit").addEventListener("click",function(){
    let dados = []

    dados.push(document.getElementById('txtdesc').value,
                document.getElementById('seq').value);
    if(document.getElementById('txtdesc').value == "" || document.getElementById('txtdesc').value == null){
        alert("Preencha o campo descrição");
    }else{
            axios.post(`${BASEURL}` + "tipolancamento/save", dados).then(res=>{
                if(res.data.codigo==1){
                    alert(res.data.texto);
                    lista();
                    return;
                }else if(res.data.codigo==0){
                    alert(res.data.texto);
                    return
                }else{
                    alert("Erro ao atualizar.");
                    return;
    }
    })}
})

