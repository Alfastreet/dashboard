const casino_id=document.querySelector("#casinoid"),total=document.querySelector("#totalLiquidation"),generate=document.querySelector("#generate");async function alertGenerate(){postLiquidation(),Swal.fire({title:"Liquidacion Realizada",text:"Se liquidaron las participaciones correctamente",icon:"success",confirmButtonColor:"#3085d6",confirmButtonText:"Descargar Liquidación",showCancelButton:!1}).then(o=>{o.isConfirmed&&window.location.replace(`${window.location.protocol}//${window.location.hostname}/casinos/getpdf?id=${casino_id.value}`)})}async function postLiquidation(){const o=new FormData;o.append("casino_id",casino_id.value),o.append("totalLiquidation",total.value);const t=`${window.location.protocol}//${window.location.hostname}/totalaccountants/add`,e=await fetch(t,{method:"POST",body:o});await e.json()}generate.addEventListener("click",o=>{o.preventDefault(),alertGenerate()});