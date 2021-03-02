<!DOCTYPE html>
<html>
<head>
  
<meta charset="utf-8">
 <style type="text/css">
   .mainpay {

  background: #FBFBFB;
}

.invoice-box{
        max-width:100%;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
        background: #fff;
    }

.info{
    padding-top: 10px;
    font-family:'Helvetica Neue', 'Helvetica',
    color:#333;
    font-size:15px;
    text-align: center;
}
.tex_voice {

  font-size: 12px;
  margin: 0px;
  font-weight: 400;
}

.imprimir_lef {

  padding-right: 20%;
  text-align: right;
  padding-bottom: 10px;

}
    .invoice-box table{
        width:100%;
       /* line-height:inherit;*/
        text-align:left;
    }
    
    .title_invoice h2 {

      font-size: 25px;
    }

    .invoice-box table td{
        
        padding:5px;
        vertical-align:top;
    }
    
   .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
     .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        /*line-height:45px;*/
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
   .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box .products{
        font-size: 12px;
    }

    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }

 .generar_orden{

  padding-top: 10px;
  text-align: center;
 }
 </style>
</head>
<body>

  <div class="invoice-box">

          <table >
            <tr class="top">
              <td colspan="2">

                <table>
                  
                   @foreach($invoice as $i)
                    <tr>
                      <td class="title">
                       <!--  <img src="http://nextstepwebs.com/images/logo.png" style="width:100%; max-width:300px;"> -->
                        <div class="title_invoice">
                         
                          <h2><i>{{ $i->copropiedad->name}}</i><br>
                          <span class="tex_voice">
                            {{$i->copropiedad->address}}<br>
                            {{$i->copropiedad->phone_1}}<br></span>
                            </h2>
                          
                        </div>
                      </td>
                      
                      <td>
                        <h3>Invoice # {{ $i->numero_doc}}</h3>
                         Vence: {{ $i->daysinrecargo }}
                      </td>
                    </tr>
                  @endforeach
                </table>          
              </td>
            </tr>
            

           <tr class="information">
              <td colspan="2">
                <table>
                  <tr>
                    <td>
                     
                    </td>
                    
                     
                    
                    <td>
                    
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            

            <tr class="heading">
                <td>
                   Metodo de Pago
                </td>
                             
                <td>
                  Consignacion Bancaria
                </td>
            </tr>
           
            <tr class="details">
                <td>
                    Banco de Bogota
                </td>
                 
                
                <td>
                 Cuenta Corriente  # 00-00-131
                </td>
            </tr>
          </table>

        <table>
            <tr class="heading">
                <td colspan="3">
                    Descripcion
                </td>
                
                <td>
                </td>

                <td>
                </td>
                                
                <td>
                    Valor Total
                </td>
            </tr>
            @foreach( $items as $item)
            <tr class="item">
                <td colspan="3">
                 <span class="products">{{ $item->concepto->name }}</span>
                </td>
                
                <td>
                </td>
                <td>
                </td>
                              
                <td>
                  <strong>
                  $ {{number_format($item->valor)}}
                  </strong>
                </td>
                
            </tr>
            @endforeach
            

            @foreach($invoice as $i)
            <tr class="total">
                

                <td colspan="3">
                </td>
                
                <td>
                </td>

                <td>
                  <strong><i>Subtotal</i><strong>
                </td>
                
                <td>
                   {{number_format($i->subtotal )}}
                </td>
            </tr>


            <tr class="total">
                

                <td colspan="3">
                </td>

                <td>
                </td>

                <td>
                  <strong><i>Total</i></strong>
                </td>
                
                <td>
                {{number_format($i->total )}}
                </td>
            </tr>
            @endforeach           
       

         
        </table>

        <div class="info">

          <p>Tel: 310-0006420
           / prueba@prueba.com / Bogota-Colombia<br>
           www.beehive.com
           </p>
        </div>
        
      </div> 



</body>
</html>