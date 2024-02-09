function login(){
    document.querySelector("#btnInc").addEventListener("click", function(){
        var txtusuario = document.getElementById("txtusuario").value
        var txtsenha = document.getElementById("txtsenha").value
    let dados=[]
    dados.push(document.getElementById('txtusuario').value,
                document.getElementById('txtsenha').value);
        if(document.getElementById('txtusuario').value == '' || document.getElementById('txtusuario').value == null){
            alert('Preencha o campo USUARIO');
        }else if(document.getElementById('txtsenha').value == '' || document.getElementById('txtsenha').value == null){
            alert('Preencha o campo SENHA');
        }else{
            axios.post(BASEURL + "usuario/login", {dados}).then(res=>{
                if(res.data.codigo == 1){
                    alert(res.data.texto);
                    window.location.href = BASEURL + "index/index"
                }else if(res.data.codigo==0){
                    alert(res.data.texto)
                }else{
                    alert("Erro no login")
                }
        })
    }
    
    })
}
login()
