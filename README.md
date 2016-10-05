# CodeIgniter-QrCode

Código fonte original(http://www.swetake.com/qrcode).
####Descrição
Os dados e parametros devem ser passados por get.
BASE_URL('qrcode?').'d=$x&e=H' retornando o qrcode no link.

Optei por esse código por ser mais simples, e fazer o que se espera.
####Parâmetros
* d= "Dados"
* e= "Taxa de erros."  L : 7%, M : 15%, Q : 25%, H : 30% de correção de erros.
* s= "tamanho dos quadrados" o padrão é 4.
* t= "tipo" p para png e j para jpg.
* v= "Tamanho do qrcode de 1-40, ele já o faz por padrão".