const machine=document.querySelector("#machine"),discount=document.querySelector("#discount"),agreementvalue=document.querySelector("#agreementvalue"),resumen=document.querySelector("#resumen"),business=document.querySelector("#business"),client=document.querySelector("#client"),dataAdd=document.querySelector("#dataAdd"),iniquote=document.querySelector("#iniquote"),quoteper=document.querySelector("#quoteper"),separation=document.querySelector("#separation"),percentValue=document.querySelector("#percentValue"),nquote=document.querySelector("#nquote"),sald=document.querySelector("#sald");async function searchId(e){const t=`${window.location.protocol}//${window.location.hostname}/machines/searchId?id=${e}`,n=await fetch(t),r=await n.json(),o=parseInt(r.value),a=new Intl.NumberFormat("en-US",{style:"currency",currency:"USD"}).format(o);resumen.innerHTML=`<tr>\n                            <th scope="row">Cliente</th>\n                            <td>Mark</td>\n                        </tr>\n                        <tr>\n                            <th scope="row">Maquina</th>\n                            <td>${r.name}</td>\n                        </tr>\n                        <tr>\n                            <th scope="row">Valor de la maquina</th>\n                            <td>${a}</td>\n                        </tr>`,discount.addEventListener("focusout",e=>{const t=e.target.value,n=o-t,r=100*t/o;percentValue.value=r,agreementvalue.value=n;const a=new Intl.NumberFormat("en-US",{style:"currency",currency:"USD"}).format(agreementvalue.value);resumen.innerHTML+=`\n                            <tr>\n                                <th scope="row">Descuento</th>\n                                <td>${percentValue.value}%</td>\n                                <td>$ ${discount.value} USD</td>\n                            </tr>\n                            <tr>\n                                <th scope="row">Valor de la Venta</th>\n                                <td>${a}</td>\n                            </tr>\n                                \n                                `}),separation.addEventListener("focusout",e=>{const t=e.target.value,n=new Intl.NumberFormat("en-US",{style:"currency",currency:"USD"}).format(t);resumen.innerHTML+=`<tr>\n                                <th scope="row">Separacion</th>\n                                <td>${n}</td>\n                            </tr>`}),quoteper.addEventListener("focusout",e=>{const t=e.target.value,n=agreementvalue.value*t/100-separation.value,r=new Intl.NumberFormat("en-US",{style:"currency",currency:"USD"}).format(n);iniquote.value=n;const o=agreementvalue.value-n-separation.value,a=new Intl.NumberFormat("en-US",{style:"currency",currency:"USD"}).format(o);sald.value=o,resumen.innerHTML+=`<tr>\n                                <th scope="row">Cuota Inicial</th>\n                                <td>${t}%</td>\n                                <td>${r}</td>\n                            </tr>\n                            <tr>\n                                <th scope="row">Saldo</th>\n                                <td>${a}</td>\n                            </tr>`}),nquote.addEventListener("focusout",e=>{const t=e.target.value,n=Math.round(sald.value/t),r=n+function(e,t){let n=0;for(let r=0;r<e;r++){n+=t*(e-r)}return n}(t,.39*n/100)/t,o=new Intl.NumberFormat("en-US",{style:"currency",currency:"USD"}).format(r);resumen.innerHTML+=`<tr>\n                                <th scope="row">Numero de Cuotas</th>\n                                <td>${nquote.value}</td>\n                            </tr>\n                            <tr>\n                                <th scope="row">Valor de la Cuota</th>\n                                <td>${o}</td>\n                            </tr>`})}machine.addEventListener("change",e=>{const t=e.target.value;0!=t?(dataAdd.style.display="block",searchId(t)):dataAdd.style.display="none"});