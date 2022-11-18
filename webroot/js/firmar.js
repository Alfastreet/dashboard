const confirmed=document.querySelector("#confirmed"),id=document.querySelector("#id").value,quotes=document.querySelector("#quotes"),quotevalue=document.querySelector("#quotevalue"),agreementvalue=document.querySelector("#agreementvalue").value,separation=document.querySelector("#separation"),_csrfToken=document.getElementsByName("_csrfToken");async function createWallet(e,o){const a=new FormData;a.append("agreement_id",e),a.append("payment",o),a.append("collection",separation.value),Swal.fire({title:"Creando Cartera, por favor espere!",timerProgressBar:!0,allowOutsideClick:!1,allowEscapeKey:!1,didOpen:()=>{Swal.showLoading()},willClose:()=>{clearInterval(void 0)}}).then(e=>{e.dismiss===Swal.DismissReason.timer&&console.log("I was closed by the timer")});try{const e=`${window.location.protocol}//${window.location.hostname}/wallets/add`,o=await fetch(e,{headers:{"X-CSRF-Token":_csrfToken[0].value},method:"POST",body:a}),t=await o.json();"ok"===t&&(console.log(t),Swal.fire("Exito!!","Cartera generada Correctamente!!","success").then(e=>{e.isConfirmed&&window.location.reload()}))}catch(e){console.error(e)}}confirmed.addEventListener("click",()=>{const e=new Date;e.toUTCString();const o=Swal.mixin({customClass:{confirmButton:"btn btn-success",cancelButton:"btn btn-danger"},buttonsStyling:!1});o.fire({title:"Advertencia?",text:"La cartera tendra vigencia desde la fecha "+e,icon:"info",showCancelButton:!0,confirmButtonText:"Si, Firmar!",cancelButtonText:"No, Cancelar!",reverseButtons:!0}).then(async e=>{if(e.isConfirmed){let e;Swal.fire({title:"Creando Nuevo estado de Cartera, por favor espere!",timerProgressBar:!0,allowOutsideClick:!1,allowEscapeKey:!1,didOpen:()=>{Swal.showLoading()},willClose:()=>{clearInterval(e)}}).then(e=>{e.dismiss===Swal.DismissReason.timer&&console.log("I was closed by the timer")});try{const e=`${window.location.protocol}//${window.location.hostname}/agreements/signed?id=${id}`,o=await fetch(e);"ok"===await o.json()&&createWallet(id,agreementvalue)}catch(e){console.log(e),o.fire("Ups!!","Ha ocurrido un error. Intentalo mas tarde :(","error")}}else e.dismiss===Swal.DismissReason.cancel&&o.fire("Cancelado","La operacion ha sido cancelada :)","error")})});