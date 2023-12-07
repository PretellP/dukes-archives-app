<!DOCTYPE html>

<html>

    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Site Metas -->
        {{-- <link rel="shortcut icon" href="{{asset('assetscustomer/img/poke-bowl-icon.png')}}" type=""> --}}

        <title> Los Archivos del Duque </title>

        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/register/css/bootstrap.css') }}" />

        <script src="https://kit.fontawesome.com/469f55554f.js" crossorigin="anonymous"></script>

        <!--owl slider stylesheet -->

        <link rel="stylesheet" href="{{ asset('assets/common/modules/bootstrap-daterangepicker/daterangepicker.css') }}">

        <!-- Custom styles for this template -->
        <link href="{{ asset('assets/login/register/css/style.css') }}" rel="stylesheet" />
        <!-- responsive style -->
        <link href="{{ asset('assets/login/register/css/responsive.css') }}" rel="stylesheet" />
        <!--estilos-->
        <link href="{{ asset('assets/login/register/css/estilos.css') }}" rel="stylesheet" />

    </head>

    <body class="bg-register">

        <!-- book section -->

        <div class="book_section layout_padding">

            <div class="form_container d-flex justify-content-center">

                <div class="bg-white p-5 rounded">

                    <form action="{{ route('register') }}" id="registerUserForm" method="POST" data-validatenickname="{{ route('users.validateRegister', ['column' => 'nickname']) }}" data-validateemail="{{ route('users.validateRegister', ['column' => 'email']) }}">
                        @csrf

                        <div class="text-center mb-5">
                            <h2>
                                REGISTRESE EN LOS ARCHIVOS DEL DUQUE
                            </h2>
                        </div>

                        <div class="row mb-3">
                            <div class="form-group col-6">
                                <label>Nombre *</label>
                                <input type="text" name="name" class="form-control" placeholder="Ingrese su nombre">
                            </div>

                            <div class="col-6">
                                <label>Apellido *</label>
                                <input type="text" class="form-control" name="lastname" autocomplete="lastname">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-6">
                                <label> Género*</label>
                                <select name="gender" class="form-control select2 genderSelect">
                                    @foreach ($genders as $key => $gender)
                                        <option value="{{ $key }}" {{ old('gender') == $key ? 'selected' : '' }}>
                                            {{ $gender }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label> Fecha de nacimiento *</label>
                                <div class="input-group">
                                    <input type="text" name="birthdate" class="form-control datepicker">
                                </div>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <label>Tipo de documento *</label>
                                <div class="input-group">
                                    <select name="document_type" class="form-control select2 document_type_select">
                                        @foreach ($document_types as $key => $type)
                                            <option value="{{ $key }} {{ old('document_type') == $key ? 'selected' : '' }}">
                                                {{ $type }} </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-6">
                                <label>Nro. de documento *</label>
                                <div class="input-group">
                                    <input type="text" name="document_number" class="form-control document_number"
                                    onkeypress="return(event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">

                                    @error('document_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="row mb-3">
                            <div class="col-12">
                                <label>Nombre de usuario *</label>
                                <input id="nickname" type="text"
                                    class="form-control" name="nickname" autocomplete="nickname" autofocus>

                                @error('nickname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <label> Contraseña *</label>
                                <input id="password" type="password"
                                    class="form-control" name="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label> Confirmar contraseña *</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-6">
                                <label>Correo *</label>
                                <input id="email" type="text" class="form-control" name="email"
                                    autocomplete="email" value="" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label>Teléfono (Opcional)</label>
                                <input type="text" class="form-control" name="phone" autocomplete="phone"
                                onkeypress="return(event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div>
                            ¿Ya tienes una cuenta?
                            <a href="{{ route('login') }}">
                                Ingresa aquí
                            </a>
                        </div>

                        <div class="custom-control custom-checkbox d-flex flex-column-reverse">
                            <input type="checkbox" name="check_authorize" class="custom-control-input" id="checked">
                            <label class="custom-control-label" for="checked">
                                <a href="#" data-toggle="modal" data-target="#Conditions"> Acepta los términos y
                                    condiciones
                                </a>
                            </label>
                        </div>


                        <!--Términos y Condiciones-->
                        <div class="modal fade" id="Conditions" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg p-2" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" style="text-transform: uppercase;"
                                            id="exampleModalLongTitle">Términos y Condiciones</h5>
                                        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </a>
                                    </div>

                                    <div class="modal-body text-justify p-4">
                                        <p>
                                            El objeto de los presentes Términos y condiciones es regular el acceso y uso al
                                            sitio web https://www.DUKESARCHIVES.com.pe/, entendiéndose por este cualquier
                                            tipo de contenido, producto y/o servicio que se encuentre a disposición del
                                            público dentro del dominio mencionado. <br>
                                            El sitio web es de titularidad de la empresa DUKESARCHIVES E.I.R.L. (en
                                            adelante, DUKESARCHIVES), quien se reserva la facultad de modificar en cualquier
                                            momento y sin previo aviso la presentación, los contenidos, la funcionalidad,
                                            los productos, los servicios y la configuración que pudiera estar contenida en
                                            este sitio web; en este sentido, el cliente reconoce y acepta que web en
                                            cualquier momento podrá interrumpir, desactivar, modificar o cancelar cualquiera
                                            de los elementos que componen el sitio web.pe o el acceso a los mismos. <br>
                                            <br>
                                            El sitio web se encuentra dirigido a personas que cuenten con la mayoría de
                                            edad, en ese sentido, el titular no tendrá responsabilidad alguna por el
                                            incumplimiento de este requisito. El cliente declara ser mayor de edad y
                                            disponer de la capacidad jurídica necesaria para sujetarse a los presentes
                                            Términos y condiciones y/o aceptar los demás documentos que se encuentren en
                                            https://www.DUKESARCHIVES.com.pe/ <br> <br>
                                            DUKESARCHIVES se compromete a realizar su mejor esfuerzo para asegurar la
                                            disponibilidad continua de sus servicios, así como para asegurar la ausencia de
                                            errores en cualquier transmisión de información que pudiera tener lugar en las
                                            transacciones; sin embargo, DUKESARCHIVES no se hace responsable cuando sus
                                            servicios se vean afectados por la naturaleza misma del internet. Asimismo, los
                                            clientes declaran conocer que el acceso a los servicios del sitio web podría
                                            ocasionalmente verse suspendido o restringido por la realización de trabajos de
                                            mantenimiento o administración de los productos ofertados. <br> <br>
                                            DUKESARCHIVES podrá actualizar y/o modificar los presentes Términos y
                                            condiciones sin previo aviso. Por este motivo recomendamos revisar los Términos
                                            y Condiciones cada vez que utilice la página web, ya que la versión aplicable
                                            será la que se encuentre colgada al momento de la consulta. <br> <br>
                                            Cualquier entrega de productos comprados a través de este sitio web, bajo la
                                            modalidad de despacho a domicilio, están limitadas a las condiciones
                                            territoriales y/o restricciones legales que puedan imponer las autoridades. En
                                            caso se deba reprogramar alguna de las entregas programadas por responsabilidad
                                            no atribuible a DUKESARCHIVES, el equipo correspondiente se comunicará con el
                                            cliente para realizar las coordinaciones necesarias. <br> <br>
                                            Nuestros procesos de manipulación y entrega de productos cumplen con los
                                            estándares de salubridad establecidos por las autoridades correspondientes, a
                                            fin de disminuir al mínimo la exposición de nuestros colaboradores y clientes;
                                            sin perjuicio de ello recomendamos tomar todas las medidas necesarias para una
                                            adecuada prevención, desinfectando los productos de manera adecuada en cuanto
                                            sean recibidos, ya que en algunos casos la entrega puede ser encargada a
                                            terceros ajenos a DUKESARCHIVES. Como parte de los protocolos de salubridad
                                            implementados durante el periodo de emergencia relacionado al COVID 19, el
                                            cliente podrá elegir entre las siguientes opciones para recibir el producto
                                            comprado a través de canales digitales: una captura de una imagen del documento
                                            de identidad de la persona que recibirá el producto, una foto de la persona
                                            sosteniendo el producto comprado o la firma del cargo de entrega, entendiéndose
                                            cualquiera de estas acciones como señal de conformidad. El tratamiento de los
                                            datos personales que se recopilen durante la vigencia de estas medidas
                                            excepcionales se realizará cumpliendo con los más alto estándares de seguridad y
                                            dichos datos será almacenados por DUKESARCHIVES en un repositorio en la nube.
                                            <br> <br>

                                        </p>
                                        <br>
                                        <p>
                                            <strong> Cláusula informativa sobre el tratamiento de datos personales </strong>
                                            <br>
                                            DUKESARCHIVES informa al cliente que realizará el tratamiento de los datos
                                            personales brindados por cliente (nombre, apellidos, documento de identidad,
                                            claves de acceso, dirección, teléfono). Este tratamiento es necesario y tiene la
                                            finalidad de ejecutar las prestaciones a nuestro cargo, brindarle al cliente el
                                            producto solicitado, realizar la entrega del mismo y poder realizar la atención
                                            de solicitudes post venta a través de los siguientes medios: centros de llamada
                                            (call centers), envío de mensajes de texto o comunicación por WhatsApp.
                                            Los proveedores a los que DUKESARCHIVES contrate para realizar el despacho de
                                            los productos adquiridos realizarán tratamiento por encargo de los datos
                                            personales del cliente.
                                            DUKESARCHIVES declara que cualquier tratamiento de los datos personales se
                                            ajusta en las normativas de protección de datos personales vigentes y aplicables
                                            dentro del territorio peruano.

                                        </p>
                                        <br>
                                        <p>
                                            <strong>1. TIENDA VIRTUAL</strong> <br>
                                            Las transacciones que se efectúen a través de la Tienda Virtual de DUKESARCHIVES
                                            (en adelante, Tienda Virtual, DUKESARCHIVES.com o www.DUKESARCHIVES.com.pe), se
                                            sujetan a los presentes términos y condiciones (en lo sucesivo, Términos y
                                            Condiciones), así como a la legislación peruana vigente, y se entienden
                                            celebradas en la provincia y departamento de Lima, República del Perú.
                                            Para comprar en la Tienda Virtual es necesaria la aceptación de los presentes
                                            Términos y Condiciones. Cualquier persona que realice una transacción mediante
                                            este canal o a través del número telefónico que DUKESARCHIVES destine para tal
                                            efecto (en adelante, Fonocompras), declara conocer y aceptar todas y cada el
                                            contenido de los mismos.

                                        </p>
                                        <br>
                                        <p>
                                            <strong> 1.1. Registro del cliente o cliente (cliente) </strong> <br>
                                            El registro del cliente en este sitio no es obligatorio para comprar a través de
                                            la Tienda Virtual, pudiendo continuar con la transacción bajo la modalidad de
                                            “invitado”, mientras que para realizar compras a través del canal Fonocompras el
                                            registro sí constituye una condición indispensable para concluir el proceso.
                                            Para el registro, el cliente debe proporcionar sus datos de identificación
                                            fidedignos y necesarios (como nombre completo, número de documento de identidad,
                                            correo electrónico, teléfonos, entre otros) los cuales podrán ser validados
                                            posteriormente. En caso Tienda Virtual detecte alguna inconsistencia en la
                                            información brindada por el cliente al momento del registro o durante el proceso
                                            de compra, podrá anular la compra y realizar la devolución/liberación del monto
                                            cobrado al medio de pago utilizado.
                                            Los datos brindados por el cliente y su interacción con la Tienda Virtual serán
                                            utilizados, además, para mostrarle al cliente ofertas, promociones y/o productos
                                            de manera personalizada según sus preferencias, siempre que el cliente se
                                            encuentre con una sesión iniciada en su navegador.
                                            El cliente inscrito en Tienda Virtual puede disponer el acceso, rectificación,
                                            cancelación u oposición de sus datos cuando lo estime conveniente y según el
                                            procedimiento establecido en nuestra Política de Privacidad.

                                        </p>
                                        <br>
                                        <p> <strong> 1.2. Clave secreta</strong> <br>
                                            Una vez registrado, el cliente deberá ingresar su número de DNI y clave de
                                            acceso para poder realizar compras en Tienda Virtual. La clave deberá ser de 6
                                            dígitos alfa-numéricos y que será solicitada antes de efectuar una transacción.
                                            Esta clave de acceso es personal e intransferible y será necesaria de acuerdo al
                                            canal de compras elegido por el cliente.
                                            Para Fonocompras, DUKESARCHIVES enviará al correo electrónico registrado, una
                                            clave temporal generada al momento del registro, la cual deberá ser cambiada
                                            ingresando a https://www.DUKESARCHIVES.com.pe./.
                                            La administración de las claves de acceso es de absoluta responsabilidad del
                                            cliente y su entrega a terceras personas o su mal utilización no implicará
                                            responsabilidad alguna para Tienda Virtual.

                                        </p>
                                        <br>
                                        <p> <strong>1.3. Medios de pagos </strong> <br>
                                            Los medios de pagos que se pueden utilizar para compras en la Tienda Virtual
                                            son:<br>
                                            a. Tarjeta de crédito DUKESARCHIVES.<br>
                                            b. Tarjetas Bancarias: Tarjetas de crédito y débito, de las marcas Visa,
                                            American Express, Diners y Mastercard. Para el canal Fonocompras, solo estará
                                            disponible el pago con tarjeta Visa.<br>
                                            c. PagoEfectivo: Es un medio de pago donde el cliente hace la reserva de su
                                            producto y se le genera un cupón de pago con el cual deberá acercarse a
                                            cualquiera de los establecimientos o agencias afiliados(as) a la empresa
                                            “PagoEfectivo” y realizar el pago del cupón antes de la fecha de vencimiento
                                            indicado en el mismo cupón, caso contrario se cancelará la solicitud de compra
                                            realizada.<br>
                                            d. Pago con QR: Es una forma de pago mediante la cual el cliente escanea un
                                            código QR desde su billetera móvil y autoriza la transacción.<br>
                                            Se realizará un cargo a la tarjeta afiliada a la billetera móvil. En caso el
                                            cliente desista de la compra y/o esta no pase por el proceso de validación de
                                            stock, la devolución se realizará a la tarjeta de débito asociada según el plazo
                                            y procedimientos establecidos por la entidad bancaria emisora.<br>
                                            e. Código primera compra sin tarjeta: Es una modalidad de pago en la cual el
                                            cliente realiza una validación de datos previa y se le genera un código de único
                                            uso asociado a una tarjeta de crédito emitida por Banco DUKESARCHIVES. Los
                                            contratos y términos asociados a dicha tarjeta serán responsabilidad de Banco
                                            DUKESARCHIVES, así como los reclamos por transacciones no reconocidas por los
                                            clientes que provengan de esta modalidad.<br>
                                            f. Gift Card DUKESARCHIVES: Modalidad de pago mediante la cual el cliente
                                            utiliza el saldo de una Gift Card virtual adquirida en DUKESARCHIVES.com o
                                            mediante compras comparativas. Las Gift Cards contienen tres datos que habilitan
                                            la posibilidad de realizar la transacción: (i) número de la tarjeta, fecha de
                                            vencimiento y código de seguridad. Se podrá hacer uso de este medio de pago en
                                            la opción de Tarjetas Bancarias. Las Gift Cards son documentos al portador, en
                                            caso de pérdida o robo deberán comunicarse de manera inmediata con nuestros
                                            servicios de atención al cliente.<br>

                                        </p>
                                        <br>
                                        <p>
                                            Ninguno de los medios de pago expuestos puede ser combinado con otro en una
                                            misma compra, es decir, no existe la opción de copago. En los casos en los que
                                            se realicen compras con Gift Cards el cliente deberá de tener mantener como
                                            saldo el valor total de la compra. Por lo tanto, el crédito, saldo o fondo del
                                            cliente, debe ser igual o mayor al importe total a cancelar. En caso contrario,
                                            la compra será rechazada. HAZ CLIC AQUI para ver los términos y condiciones
                                            específicos del uso de Gift Cards.
                                            Debido a las acciones de mejoría constante en la web www.DUKESARCHIVES.com.pe,
                                            en el caso surja alguna falla técnica u otros motivos, DUKESARCHIVES se reserva
                                            el derecho de ocultar temporalmente o determinar cómo no disponible, alguno o
                                            todos los medios de pago mencionados sin previo aviso.
                                            Tienda Virtual considerará como no válida la transacción cuando se evidencie o
                                            notifique algún tipo de fraude, cuando se produzca un error sistémico que
                                            distorsione el precio de las ofertas o cuando concurra alguna otra causa
                                            justificada, y procederá a anular la transacción, cancelar el despacho del
                                            producto y solicitar al banco emisor de la tarjeta para que la devolución del
                                            importe comprometido.
                                            Los aspectos relativos al funcionamiento de las tarjetas de crédito aceptadas en
                                            la Tienda Virtual están sujetos al contrato existente entre el cliente y el
                                            banco emisor de esta, sin que DUKESARCHIVES tenga responsabilidad alguna sobre
                                            los aspectos señalados en dichos contratos. Sin perjuicio de lo cual, antes
                                            declara que las órdenes de pago se emitieron y se ejecutaron en la provincia y
                                            departamento de Lima, República del Perú.

                                        </p>
                                        <br>
                                        <p> <strong> 1.4 Anulaciones de compra</strong> <br>
                                            El cliente podrá solicitar la anulación de la compra a través de los canales de
                                            atención de DUKESARCHIVES.com hasta tres (3) días antes de la fecha estimada de
                                            despacho al domicilio del cliente. Una vez recibido el pedido de anulación y su
                                            revisión, se comunicará a la entidad emisora del medio de pago la solicitud de
                                            extorno, el tiempo de procesamiento de la operación, varía según el método de
                                            pago empleado al momento de la compra.
                                            En caso que el cliente solicite la anulación de la compra y el pedido se
                                            encuentre programado o en ruta, el cliente asumirá los gastos de envío.
                                            En caso que el cliente haya elegido el despacho para el mismo día de la compra o
                                            durante las veinticuatro (24) horas de haber realizado la misma, no podrá
                                            solicitar la cancelación de la compra. Asimismo, las compras realizadas en
                                            www.DUKESARCHIVES.com.pe están sujetas a verificación de disponibilidad, la
                                            misma que podrá ser comunicada incluso luego de emitido el comprobante de pago.
                                            En caso el producto no se encuentre disponible nos comunicaremos con usted por
                                            correo electrónico o SMS, a efectos de informarle la anulación de la compra,
                                            salvo que dentro del plazo señalado en dicha comunicación recibamos instrucción
                                            en contrario a través del canal establecido para eso. Dicha verificación podrá
                                            ser comunicada hasta un (1) día antes de la fecha de la entrega programada.
                                            En caso la compra haya sido realizada con tarjeta de crédito y/o débito o
                                            billetera QR el tiempo de la devolución/liberación de fondos es responsabilidad
                                            de la entidad financiera que emitió la tarjeta. Tiendas DUKESARCHIVES, no es
                                            responsable por ninguna demora o incidencia que presente la Entidad Financiera
                                            para la ejecución de la operación de reembolso.
                                            En el supuesto de una anulación de compra pagada a través de Pago Efectivo, la
                                            devolución de los fondos se realizará únicamente en efectivo en cualquiera de
                                            los módulos de cajas de nuestras tiendas.
                                            En caso la devolución corresponda a compras realizadas con Gift Card
                                            DUKESARCHIVES, la atención del requerimiento se realizará en máximo 5 a 10 días
                                            contados desde la fecha de solicitud de devolución.

                                        </p>
                                        <br>
                                        <p> <strong>1.5. Validez, precio y stock de las ofertas contenidas en este
                                                sitio.</strong> <br>
                                            Los precios y servicios exhibidos en www.DUKESARCHIVES.com.pe son exclusivos
                                            para las compras efectuadas en Tienda Virtual y no son aplicables a
                                            transacciones efectuadas en otras tiendas y/o canales de DUKESARCHIVES.
                                            Asimismo, los precios y servicios exhibidos en otras tiendas y/o canales de
                                            DUKESARCHIVES no necesariamente tienen aplicación a las transacciones efectuadas
                                            en https://simple.DUKESARCHIVES.com.pe/.
                                            En el supuesto en que por un error o evento fuera del control de DUKESARCHIVES,
                                            el precio correcto del producto sea más alto que el precio consignado en su
                                            orden de compra, nos contactaremos con usted dentro de los 3 días hábiles
                                            siguientes a la transacción para informarle este hecho y realizar las
                                            coordinaciones necesarias.
                                            Los precios de los productos consignados en la Tienda Virtual son en moneda
                                            nacional peruana (s/), de igual manera que los comprobantes de pago que se
                                            emiten.
                                            Las ofertas, promociones y campañas Ahora o Nunca referidas al uso de Tarjeta
                                            DUKESARCHIVES, aplicarán únicamente para pagos realizados con tarjetas de
                                            crédito de Banco DUKESARCHIVES mediante la opción “Tarjeta DUKESARCHIVES”. Si el
                                            cliente utiliza su tarjeta de crédito o débito de Banco DUKESARCHIVES, en la
                                            opción de “Tarjetas de crédito y débito Visa, Mastercard, Amex, Diners), no se
                                            aplicará el monto con descuento referido.
                                            Los precios de los productos y servicios publicados en este sitio web se
                                            encontrarán vigentes únicamente mientras aparezcan en el mismo.
                                            DUKESARCHIVES.com podrá modificar cualquier información contenida en este sitio,
                                            incluyendo las relacionadas con mercadería, servicios, precios, stock y demás
                                            condiciones, en cualquier momento y sin previo aviso.
                                            El stock ofrecido es de 1 producto por oferta. Los productos publicados en este
                                            sitio son válidos exclusivamente para consumo familiar, por lo que no se permite
                                            la adquisición de más de 1 oferta por persona y/o tarjeta de crédito.
                                            DUKESARCHIVES no se responsabiliza de la información proporcionada por otros
                                            sitios web y las consecuencias derivadas de ello, especialmente cuando el acceso
                                            al sitio de Tienda Virtual se ha efectuado a través de un link o banner en
                                            sitios que no dispongan de contratos o alianzas con www.DUKESARCHIVES.com.pe.

                                        </p>
                                        <br>
                                        <p> <strong>1.6. Métodos de despacho </strong> <br>
                                            El despacho y/o entrega de los productos se podrá realizar a través de las
                                            modalidades indicadas en la presente sección, según disponibilidad mostrada en
                                            la ficha del producto.
                                        </p>
                                        <br>
                                        <p>
                                            <strong> 1.6.1. Despacho a domicilio </strong> <br>
                                            Bajo esta modalidad de despacho, la entrega es realizada en una dirección que el
                                            cliente ingresa al momento de efectuar la compra.
                                            Es responsabilidad del cliente ingresar datos correctos y completos en su
                                            compra, para que la entrega se pueda realizar de forma oportuna en la dirección
                                            y fecha programada. En caso se presente algún error en la dirección ingresada
                                            por el cliente no se podrá realizar la entrega coordinada y se procederá con la
                                            anulación de la compra y devolución/liberación de los fondos al medio de pago
                                            utilizado, previa validación y coordinación con el cliente.
                                            En caso no se logre realizar la entrega en la fecha programada, por
                                            responsabilidad del cliente, DUKESARCHIVES reprogramará la entrega una (1) vez
                                            más, en caso no se culmine el proceso de entrega se procederá con la anulación
                                            de compra y devolución/liberación de los fondos al medio de pago utilizado,
                                            previa validación y coordinación con el cliente. No se realizará devolución por
                                            gastos de envío.
                                            Todo cambio de dirección (siempre que sea dentro del mismo distrito) y/o fecha
                                            de entrega se debe solicitar con una anticipación mínima de dos (2) días hábiles
                                            antes de la fecha pactada de entrega, la solicitud será evaluada y dependerá de
                                            la disponibilidad de productos y almacenamiento con la que se cuente. La
                                            solicitud de cambio solo podrá ser realizada por el titular de la compra quien
                                            pasará previamente por un proceso de validación de identidad. No es posible
                                            adelantar las fechas de entrega ya programadas. No es posible modificar el
                                            teléfono o e-mail del cliente registrado durante el proceso de compra.
                                            Al recibir el producto, el cliente debe validar que corresponda con su compra y
                                            que se encuentra en buen estado antes de declarar que se encuentra conforme con
                                            la entrega. En caso de disconformidad, debe rechazar el producto en el momento
                                            de la entrega e indicar los motivos, su nombre y DNI en la guía de despacho.
                                            En caso que el producto fuera recibido en buenas condiciones y completo, el
                                            cliente declarará su conformidad con la entrega. Luego de la aceptación del
                                            despacho, DUKESARCHIVES no se responsabiliza por daños físicos al producto. Por
                                            lo que solo se atenderá la aplicación de la garantía según lo establecido en el
                                            punto 6 de los presentes Términos y Condiciones.
                                            El Transportista no realiza instalaciones ni armados de productos, en caso de
                                            requerir el servicio de instalación deberá comunicarse con el fabricante; en
                                            caso de requerir el servicio de armado, podrá contratarlo a través de nuestra
                                            página web www.DUKESARCHIVES.com, siempre que el producto requiera este
                                            servicio. Estos servicios se realizan de manera posterior a la entrega y tienen
                                            un costo adicional, el cual dependerá de la marca y será informado al cliente.
                                            Los costos podrán ser revisados en https://www.DUKESARCHIVES.com.pe/. Tiendas
                                            DUKESARCHIVES no asume el costo de ningún servicio de instalación o armado.
                                            Las entregas de 90 minutos aplican para entregas en Lima Metropolitana, solo
                                            para los productos de la Tienda Virtual de DUKESARCHIVES con despacho a
                                            domicilio que cuenten con el TAG/etiqueta del servicio. Solo aplica para un
                                            máximo de 10 unidades por envío. Los pedidos podrían demorar más de 90 minutos
                                            para los distritos de Ate, San Martin de Porres y Santa Anita. Las compras
                                            realizadas luego de las 7:00 pm se enviarán al día hábil siguiente. HAZ CLIC
                                            AQUI para revisar las zonas de cobertura.
                                            Las entregas de Same Day Delivery de DUKESARCHIVES aplican para Lima
                                            Metropolitana, solo para los productos de la Tienda Virtual de DUKESARCHIVES con
                                            despacho a domicilio que cuenten con el TAG/etiqueta del servicio. Aplica para
                                            pedidos que se hayan realizado entre las 8:00 am y 2:00 pm del mismo día. Solo
                                            aplica para un máximo de tres (3) unidades por envío. Los pedidos podrían
                                            demorar más de 90 minutos para los distritos de Ate, San Martin de Porres y
                                            Santa Anita. HAZ CLIC AQUI para revisar las zonas de cobertura.

                                        </p>
                                        <br>
                                        <p>
                                            <strong> 1.7. Garantía </strong> <br>
                                            Todos los productos de DUKESARCHIVES cuentan con garantía, que se aplicará según
                                            el certificado de garantía emitido por la marca o de acuerdo a las condiciones
                                            indicadas en las características del producto. El tiempo de garantía lo
                                            establece la marca a través del certificado de garantía que llegará junto al
                                            producto.
                                            Dependiendo de la marca del producto, el cliente deberá comunicarse con el
                                            centro de servicio autorizado de la marca para que se informe sobre las
                                            condiciones de uso de la garantía. La asistencia técnica, en caso aplique la
                                            garantía, la deberá coordinar el cliente con la marca directamente o con
                                            DUKESARCHIVES, según lo dispuesto en el certificado de garantía de la marca. La
                                            visita técnica en domicilio, se realizará dependiendo el tipo de producto y la
                                            disponibilidad de la marca.
                                            Condiciones para hacer efectiva la garantía: <br>
                                            a. El daño que presente el producto no puede ser atribuible al cliente o a
                                            terceros <br>
                                            b. La garantía solo cubrirá desperfecto con origen de fábrica. <br>
                                            c. Debe contar con el ticket o comprobante electrónico, la cual acredita la
                                            adquisición del producto.<br>
                                            Condiciones que invalidan la garantía: <br>
                                            i. Al ocurrir hecho fortuito o de fuerza mayor de cualquier tipo posterior a la
                                            entrega, entre ellos: terremotos, incendios, inundaciones, derrames de líquidos
                                            o gaseosos que afecten la integridad y calidad del producto.<br>
                                            ii. Cuando el producto o cualquiera de sus componentes presenten fallas causadas
                                            por maltrato, desconocimiento, incumplimiento de instrucciones o por mal
                                            uso.<br>
                                            iii. En caso se destine el producto a un propósito distinto al que fue
                                            diseñado.<br>
                                            iv. Cuando el producto no haya sido abierto, manipulado, armado o instalado por
                                            personal no autorizado por DUKESARCHIVES o la marca.<br>
                                            o • ELECTRO y TECNOLOGIA: No se aplica la garantía en los siguientes casos: (i)
                                            los sellos de garantía estén rotos; (ii) no se hayan seguido las instrucciones
                                            de uso; (iii) daños causados por variaciones de voltaje de la energía eléctrica;
                                            o, (iv) se haya realizado manipulación o alguna instalación por personal no
                                            autorizado por la marca.<br>
                                            o • VESTUARIO O TEXTIL: la garantía aplicará si el producto presenta defectos de
                                            fabricación: costuras, cierres, decoloración natural (sin exposición a
                                            detergentes), siempre que se hayan seguido las instrucciones de cuidado, uso y
                                            lavado de la prenda que se indican en la etiqueta del producto.<br>
                                            o • MUEBLES: la garantía aplica según los términos y condiciones expuestos en el
                                            certificado de garantía, que viene con el producto. La misma es aplicable a
                                            daños de fabricación siempre que estos: (i) no hayan sido ocasionados por la
                                            falta de cuidado con el producto o factores ajenos a DUKESARCHIVES; y, (ii). el
                                            producto no haya sido abierto, manipulado, armado o instalado por personal no
                                            autorizado por DUKESARCHIVES.<br>
                                            o • MAQUINAS: La garantía la aplica la marca, en función a las condiciones
                                            indicadas en las características del producto. No aplica en caso el producto
                                            haya sido abierto, manipulado, armado y/o instalado por personal no autorizado
                                            por DUKESARCHIVES o la marca.<br>
                                            Para la aplicación de la garantía, la marca a través de su servicio técnico
                                            autorizado determinará, previa evaluación del daño o falla, si procede la
                                            aplicación de la garantía, para ello emitirá un informe técnico.

                                        </p>
                                        <br>
                                        <p>
                                            <strong> 1.8. Comprobantes De Pago </strong> <br>
                                            El cliente deberá decidir correctamente el tipo de documento electrónico que
                                            solicitará como comprobante de pago de su compra, ya que de acuerdo al
                                            Reglamento de Comprobantes de Pago aprobado por Resolución de Superintendencia
                                            N° 007-99/SUNAT (RCP) y al Texto Único Ordenado de la Ley del Impuesto General a
                                            las Ventas e Impuesto Selectivo al Consumo, aprobado mediante Decreto Supremo N°
                                            055-99-EF y normas modificatorias, no procederá cambio alguno:
                                            “No existe ningún procedimiento vigente que permita el canje de boletas de venta
                                            por facturas, más aún las notas de crédito no se encuentran previstas para
                                            modificar al adquirente o cliente que figura en el comprobante de pago
                                            original”.
                                            Al aceptar estos términos y condiciones, el cliente autoriza a DUKESARCHIVES a
                                            que envíe el comprobante electrónico al correo electrónico consignado en el
                                            proceso de compra, el mismo que podrá visualizarse a través de la Tienda Virtual
                                            (http://asp402r.paperless.com.pe/BoletaDUKESARCHIVES/).

                                        </p>

                                        <p> <strong> 1.9. Mailing </strong> <br>
                                            Todos los precios de los productos recibidos por mailing y de remitente
                                            “DUKESARCHIVES Perú” tienen una vigencia de 24 horas desde recibido el mismo.
                                        </p>
                                        <p> <strong> 2. MERCADO DUKESARCHIVES</strong> <br>
                                            Las transacciones que se efectúen a través del sitio web
                                            https://simple.DUKESARCHIVES.com.pe/ (el “Sitio Web), en la modalidad “Mercado
                                            DUKESARCHIVES.com”, en adelante “Mercado DUKESARCHIVES”, se encuentran sujetas a
                                            los presentes Términos y Condiciones, así como, de forma supletoria, a los
                                            Términos y Condiciones de la “Tienda Virtual” y a la legislación peruana
                                            vigente.
                                            Es requisito obligatorio y previo para comprar en la modalidad Mercado
                                            DUKESARCHIVES, la aceptación de los Términos y Condiciones descritos a
                                            continuación, así como de los Términos y Condiciones de la “Tienda Virtual”:

                                        </p>
                                        <p> <strong> 2.1. Descripción del servicio </strong> <br>
                                            Mercado DUKESARCHIVES es una plataforma virtual por medio de la cual, distintos
                                            proveedores bajo su propia cuenta y riesgo (en adelante, “Proveedor”), ofrecen
                                            sus productos y/o servicios, informan las características de los mismos y
                                            realicen la venta de éstos a los consumidores que visiten el sitio web.
                                            DUKESARCHIVES no es dueño de los productos ni presta directamente los servicios
                                            que se comercializan u ofrecen en el sitio web bajo la modalidad de Mercado
                                            DUKESARCHIVES, por lo tanto: (i) no está en posesión de, ni presta, los mismos,
                                            (ii) no los ofrecen en venta, ni los presta, en forma directa a los
                                            consumidores, (iii) no participa de la determinación del precio de los productos
                                            y/o servicios, el mismo que podrá variar hasta el momento de recibir una orden
                                            de compra válida (iv) no determina ofertas ni promociones, (v) no interviene en
                                            el perfeccionamiento de las transacciones entre los proveedores y consumidores y
                                            (vi) no realiza directamente los despachos de productos al consumidor.
                                            La labor de DUKESARCHIVES se limita a: (i) poner a disposición de los
                                            consumidores el acceso a la plataforma virtual Mercado DUKESARCHIVES, (ii) la
                                            recaudación de los pagos realizados con motivo de la comercialización de los
                                            productos y/o prestación de los servicios, (iii) la ejecución de las demás
                                            obligaciones que expresamente pudieran estar establecidas para DUKESARCHIVES en
                                            estos Términos y Condiciones.

                                        </p>
                                        <p> <strong>2.2. Validez, precio y stock de las ofertas contenidas en este sitio
                                            </strong> <br>
                                            El Cliente entiende que es entera responsabilidad del Proveedor la actualización
                                            de la información contenida en el sitio web respecto de los productos y/o
                                            servicios que comercializa, brinda, a través de Mercado DUKESARCHIVES.
                                            Siendo, que DUKESARCHIVES no es responsable de cualquier (i) error, (ii) omisión
                                            o (iii) falta de actualización del sitio web puesto a disposición del Proveedor
                                            para la oferta de sus productos y/o de los servicios, respecto de los precios,
                                            validez de ofertas, condiciones y/o stock de productos.

                                        </p>
                                        <p> <strong>2.3. Medios de pago aceptados</strong> <br>
                                            Salvo que se indique lo contrario, los medios de pago que los consumidores
                                            podrán utilizar son los siguientes: <br>
                                            a. Cualquier tarjeta de crédito: Visa, MasterCard, American Express y Diners
                                            Club, vigente y activa. <br>
                                            b. Gift Cards DUKESARCHIVES virtuales que cuenten con los datos necesarios para
                                            realizar la transacción; (i) número de tarjeta, (ii) fecha de vencimiento y
                                            código de seguridad. <br>
                                            c. Cupones de descuento puestos a disposición del consumidor por DUKESARCHIVES
                                            de manera física o virtual, que indiquen específicamente que pueden ser
                                            redimidos en Mercado DUKESARCHIVES, asimismo el cliente deberá considerar los
                                            procedimientos específicos indicados en los términos y condiciones de redención
                                            del cupón para que estos puedan ser redimidos en la web.

                                        </p>
                                        <p> <strong> 2.4. Cambios y devoluciones</strong> <br>
                                            Respecto de los productos adquiridos, los consumidores tendrán la posibilidad de
                                            devolver un producto adquirido en Mercado DUKESARCHIVES dentro del plazo de 7
                                            días calendario contados a partir de la recepción del mismo, sin necesidad de
                                            invocar ninguna causa (arrepentimiento de compra), siempre y cuando, el producto
                                            no haya sido usado, averiado y/o deteriorado por causa del consumidor.
                                            Asimismo, el producto que se pretende devolver, deberá ser acompañado de todos
                                            sus componentes y accesorios, además deberá de entregarse el producto con la
                                            totalidad de los elementos originales del embalaje, como las etiquetas,
                                            certificados de garantía, manuales de uso, cajas, elementos de protección y sus
                                            accesorios.
                                            En el caso de la prestación de servicios, por la naturaleza de los mismos –
                                            siempre y cuando éstos no hayan sido brindados, no procede la devolución.
                                            Asimismo, el consumidor reconoce y acepta que será exclusivamente el Proveedor
                                            quien asumirá la responsabilidad de cualquier tipo de garantía, daño y
                                            perjuicios directos o indirectos, lucro cesante, daño emergente, daño a la
                                            imagen, lesiones, enfermedades sufridos por el Usuario o Comprador directamente
                                            o indirectamente causados en su totalidad o en parte por el Proveedor, así como
                                            de cualquier responsabilidad por el servicio contratado.
                                            Adicionalmente, el Usuario o Comprador acepta y entiende que los cupones sobre
                                            servicios adquiridos, no pueden ser reembolsados total o parcialmente, ni
                                            acumulados con otras promociones que el Proveedor oferte al momento de la compra
                                            o del canje.
                                            Para ejercer este derecho, el consumidor deberá contactarse al número de
                                            Atención al Cliente de DUKESARCHIVES (+51 1611-5959), y generar un ticket de
                                            cambio/devolución. Cualquier solicitud de cambio, devolución, reposición o
                                            garantía deberá ser realizada por el consumidor directamente al Proveedor,
                                            siempre y cuando DUKESARCHIVES lo indique así previa coordinación con el
                                            Proveedor, no siendo necesario que DUKESARCHIVES intervenga en dicha
                                            comunicación. Al momento de hacer la entrega del producto, de acuerdo a lo antes
                                            señalado, el consumidor deberá acompañar la boleta original o cualquier
                                            documento que acredite la compra.
                                            En caso de cambio o devolución por falla técnica o producto dañado en la ruta de
                                            entrega, el cliente deberá de comunicarse con Atención al Cliente de
                                            DUKESARCHIVES al (+51 1-611-5959) para que se genere el ticket correspondiente y
                                            se siga con el procedimiento de cambio o devolución de Mercado DUKESARCHIVES.
                                            HAZ CLIC AQUI para conocer dicho procedimiento.
                                            Las condiciones particulares referentes a cambios y devoluciones se encuentran
                                            en la página de compra de cada proveedor, considerando que existen excepciones
                                            de acuerdo a la categoría de productos adquiridos (como lencería, ropas de
                                            baños, gourmet, mascotas y supermercado). Los productos que no se encuentran
                                            sujetos a cambios y/o devoluciones son los siguientes: <br>
                                            o • Manipulados, usados, averiados, deteriorados, sucios o desgastados por el
                                            cliente. <br>
                                            o • De uso íntimo, cuidado personal, artículos de limpieza del hogar o
                                            perecederos. <br>
                                            o • Que no tengan etiquetas, documentación, accesorios y empaques originales.
                                            <br>
                                            o • Gift cards vendidas por DUKESARCHIVES en DUKESARCHIVES.COM o en tiendas
                                            físicas a nivel nacional. <br>
                                            HAZ CLIC AQUI para conocer la forma de devolución y/o cambio de Mercado
                                            DUKESARCHIVES. El consumidor entiende que la decisión final respecto del cambio
                                            o devolución del producto adquirido corresponde al Proveedor, siendo que es este
                                            quien vende el producto de manera directa utilizando las plataformas de venta
                                            desarrolladas por DUKESARCHIVES.

                                        </p>
                                        <p> <strong> 2.5. Garantía de producto</strong> <br>
                                            Las condiciones para cambios, devoluciones y servicio técnico de los productos
                                            que sean adquiridos por los consumidores serán las que en cada caso en
                                            particular sean informadas por los respectivos Proveedores con ocasión de la
                                            oferta y/o comercialización de un producto determinado.
                                            DUKESARCHIVES no ofrece ningún tipo de garantía respecto a los productos
                                            adquiridos y/o servicios brindados por los proveedores en la plataforma Mercado
                                            DUKESARCHIVES. Para mayor información respecto de la garantía ofrecida por el
                                            Proveedor para el producto adquirido y/o servicio prestado es necesario acudir a
                                            la página de venta del proveedor dentro de la plataforma de Mercado
                                            DUKESARCHIVES.

                                        </p>
                                        <p> <strong> 2.6. Despacho y entrega de productos </strong> <br>
                                            El despacho y la entrega de los productos adquiridos a través de Mercado
                                            DUKESARCHIVES, se realizará a través de un operador logístico contratado para
                                            tales efectos por DUKESARCHIVES, dicho despacho y entrega, se sujetará a las
                                            condiciones que se consignen en cada caso en particular.
                                            Una vez recibida una orden de compra, el consumidor recibirá una confirmación de
                                            orden de compra en la que se consignará la información de la transacción,
                                            indicando además: (i) los datos de contacto del proveedor, (ii) el plazo
                                            previsto para la entrega de los productos y (iii) los demás detalles y
                                            condiciones aplicables a la orden de compra respectiva.
                                            Los productos serán transportados a través de medios que procuren su adecuada
                                            protección, tales como cajas o bolsas debidamente acondicionadas para el
                                            traslado de los bienes y otros elementos de seguridad según el tipo de producto
                                            del que se trate. Al momento de la entrega en consumidor suscribirá un acta de
                                            conformidad, entendiéndose así que el producto fue entregado en buen estado para
                                            todos los efectos.
                                            El consumidor reconoce, que en caso el Courier acuda hasta en dos (2)
                                            oportunidades sin éxito a la dirección consignada al momento de realizar la
                                            transacción, la orden de compra procederá a ser anulada sin responsabilidad del
                                            proveedor ni de DUKESARCHIVES.
                                            El proveedor enviará al consumidor una copia del comprobante de pago, sea esta
                                            electrónica o física, en cuyo caso será entregada al cliente al momento del
                                            despacho, que acredite su compra. Dicho comprobante de pago será emitido
                                            directamente por el proveedor (razón social y RUC del proveedor), y debe
                                            contener todos los datos relativos a la transacción y demás información
                                            pertinente de acuerdo a la legislación aplicable.
                                            El cliente será el único responsable por los datos de contacto como (i) Nombres,
                                            (ii) Teléfono y (ii) dirección de envío para el adecuado despacho de los
                                            productos adquiridos a través de Mercado DUKESARCHIVES. DUKESARCHIVES no es
                                            responsable bajo ningún supuesto en caso de (i) error, (ii) omisión y/o (iii)
                                            falsedad en la información consignada al momento de la compra.
                                            El Proveedor hará indicación específica, de ser el caso, de la procedencia de
                                            servicios de armado e instalación de los productos adquiridos, que así lo
                                            requieran, en la Tienda Virtual puesta a su disposición en Mercado
                                            DUKESARCHIVES.
                                            No es responsabilidad de DUKESARCHIVES proveer dicho servicio al Cliente.
                                            Asimismo, las coordinaciones referidas a tal servicio se deberán hacer de manera
                                            directa con el Proveedor. DUKESARCHIVES no será responsable, por la oportuna y
                                            correcta ejecución del mencionado servicio, siendo que es el Proveedor quien
                                            deberá responder ante cualquier incumplimiento.
                                        </p>

                                        <p><strong> 2.7. Prestación de servicios </strong> <br>
                                            La adquisición de un Servicio ofrecido a través de Mercado DUKESARCHIVES, se
                                            realizará a través de una confirmación enviada al correo electrónico designado
                                            por el cliente. El Servicio se sujetará a las condiciones que se consignen en
                                            cada caso en particular.
                                            Una vez recibida la orden de compra, el consumidor recibirá una confirmación de
                                            orden de compra y un cupón de servicio en la que se consignará la información de
                                            la transacción, indicando además: (i) los datos de contacto del proveedor, (ii)
                                            el plazo previsto para la prestación del servicio; y, (iii) los demás detalles y
                                            condiciones aplicables a la orden de compra respectiva.
                                            El cliente será el único responsable por los datos de contacto, tales como: (i)
                                            Nombres, (ii) Teléfono y (ii) correo electrónico donde se enviará la
                                            confirmación de la adquisición del servicio ofrecido a través de Mercado
                                            DUKESARCHIVES. DUKESARCHIVES no es responsable bajo ningún supuesto en caso de
                                            (i) error, (ii) omisión y/o (iii) falsedad en la información consignada al
                                            momento de la compra.

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="btn_box mb-3">
                            <button type="submit" class="btn btn-warning text-white col-12">
                                REGÍSTRESE
                            </button>
                        </div>




                    </form>

                </div>

            </div>
        </div>


        <!-- end book section -->


        <script src="{{ asset('assets/common/modules/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/common/js/jquery.validator.js') }}"></script>
        <script src="{{ asset('assets/common/modules/popper.js') }}"></script>

        <script src="{{asset('assets/common/modules/bootstrap/js/bootstrap.min.js')}}"></script>

        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

        <script src="{{asset('assets/common/modules/moment.min.js')}}"></script>
        <script src="{{asset('assets/common/js/moment_tz.js')}}"></script>

        <script src="{{asset('assets/common/js/stisla.js')}}"></script>

        <script src="{{asset('assets/common/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

        <script src="{{asset('assets/common/js/scripts.js')}}"></script>
        <script src="{{ asset('assets/common/js/global.js') }}"></script>

        <script src="{{ asset('assets/login/js/register.js') }}"></script>

    </body>

</html>
