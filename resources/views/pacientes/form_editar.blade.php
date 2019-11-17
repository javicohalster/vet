<div class="col-md-12">
    <div class="row">
        <div class="col-md-8">
            <div class="tab-content">
                <div class="tab-pane active" id="1">
                    <form class="form" id="form_editar_paciente">
                        <input type="text" name="id" id="id_paciente" hidden="true">
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">NOMBRE MASCOTA:</label>
                                    <input type="text" class="form-control" id="nombres_e" name="nombres_e">
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">PROPIETARIO:</label>
                                    <input type="text" class="form-control" id="apellidos_e" name="apellidos_e">
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">NACIMIENTO:</label>
                                    <input type="text" class="form-control datepicker" id="nacimiento_e" name="nacimiento_e">
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">EMAIL:</label>
                                    <input type="email" class="form-control" id="email_e" name="email_e">
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">TELÉFONO:</label>
                                    <input type="text" class="form-control" id="telefono_e" name="telefono_e">
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">DIRECCIÓN:</label>
                                    <input type="text" class="form-control" id="direccion_e" name="direccion_e">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="genero_e" value="MACHO">MACHO
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="genero_e" value="HEMBRA">HEMBRA
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="alergia_e" value="SI">ESTERILIZADO
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="alergia_e" value="NO">NO ESTERILIZADO
                                            </label>
                                        </div>
                                    </div>
                            </div>
                    </div>
                <div class="tab-pane" id="2">
                       
                        <div class="row sinpadding">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">ESPECIE</label>
                                        <select id="medicamento_e" name="medicamento_e" class="form-control" data-style="select-with-transition">
                                                <option value="">-- Seleccione --</option>
                                                <option value="CANINA">CANINA</option> 
                                                <option value="FELINA">FELINA</option>
                                                <option value="OTRA">OTRA</option>
                                               
                                          </select>                                                          
                                    </div>
                                </div>
                        </div>
                        <div class="row sinpadding">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">RAZA</label>
                                        <!--<select id="sangre_e" name="sangre_e" class="form-control" data-style="select-with-transition">
                                            <option value="">-- Seleccione --</option>
                                             @foreach($razas as $raza)
                                                <option value="{{ $raza->nombre }}">{{ $raza->nombre }}</option>
                                            @endforeach
                                      </select> -->
                                      <select id="sangre_e" name="sangre_e" class="form-control" data-style="select-with-transition">
                                            <option value="">-- Seleccione --</option>
                                                                                             <option value="Akita Americano">Akita Americano</option>
                                                                                            <option value="Akita Inu">Akita Inu</option>
                                                                                            <option value="Alano Español">Alano Español</option>
                                                                                            <option value="Alaska Malamute">Alaska Malamute</option>
                                                                                            <option value="American Bully (en)">American Bully (en)</option>
                                                                                            <option value="American Staffordshire Terrier">American Staffordshire Terrier</option>
                                                                                            <option value="Angóra">Angóra</option>
                                                                                            <option value="Basset Hound">Basset Hound</option>
                                                                                            <option value="Beagle">Beagle</option>
                                                                                            <option value="Bichón Maltés">Bichón Maltés</option>
                                                                                            <option value="Bisben">Bisben</option>
                                                                                            <option value="Boerboel">Boerboel</option>
                                                                                            <option value="Border Collie">Border Collie</option>
                                                                                            <option value="Boxador">Boxador</option>
                                                                                            <option value="Bóxer">Bóxer</option>
                                                                                            <option value="Boyero De Berna">Boyero De Berna</option>
                                                                                            <option value="Bull Terrier">Bull Terrier</option>
                                                                                            <option value="Bulldog">Bulldog</option>
                                                                                            <option value="Bulldog Americano">Bulldog Americano</option>
                                                                                            <option value="Bullenbeisser">Bullenbeisser</option>
                                                                                            <option value="Bullmastiff">Bullmastiff</option>
                                                                                            <option value="Cairn Terrier">Cairn Terrier</option>
                                                                                            <option value="Can De Palleiro">Can De Palleiro</option>
                                                                                            <option value="Cão Da Serra Da Estrela">Cão Da Serra Da Estrela</option>
                                                                                            <option value="Cão Da Serra De Aires">Cão Da Serra De Aires</option>
                                                                                            <option value="Cão De água Português">Cão De água Português</option>
                                                                                            <option value="Cão De Castro Laboreiro">Cão De Castro Laboreiro</option>
                                                                                            <option value="Castellano">Castellano</option>
                                                                                            <option value="Cavalier King Charles Spaniel">Cavalier King Charles Spaniel</option>
                                                                                            <option value="Cazador De Alces Noruego">Cazador De Alces Noruego</option>
                                                                                            <option value="Chihuahueño">Chihuahueño</option>
                                                                                            <option value="Chongqing">Chongqing</option>
                                                                                            <option value="Chow Chow">Chow Chow</option>
                                                                                            <option value="Cirneco Del Etna">Cirneco Del Etna</option>
                                                                                            <option value="Clumber Spaniel">Clumber Spaniel</option>
                                                                                            <option value="Cocker Americano">Cocker Americano</option>
                                                                                            <option value="Cocker Spaniel Inglés">Cocker Spaniel Inglés</option>
                                                                                            <option value="Collie ">Collie </option>
                                                                                            <option value="Coonhound Negro Y Bronce">Coonhound Negro Y Bronce</option>
                                                                                            <option value="Corgi Galés De Cardigan">Corgi Galés De Cardigan</option>
                                                                                            <option value="Corgi Galés De Pembroke">Corgi Galés De Pembroke</option>
                                                                                            <option value="Crestado Chino">Crestado Chino</option>
                                                                                            <option value="Crestado Rodesiano">Crestado Rodesiano</option>
                                                                                            <option value="Cuvac Eslovaco">Cuvac Eslovaco</option>
                                                                                            <option value="Dachshund">Dachshund</option>
                                                                                            <option value="Dálmata">Dálmata</option>
                                                                                            <option value="Dandie Dinmont Terrier">Dandie Dinmont Terrier</option>
                                                                                            <option value="Dingo">Dingo</option>
                                                                                            <option value="Dóberman">Dóberman</option>
                                                                                            <option value="Dogo Argentino">Dogo Argentino</option>
                                                                                            <option value="Dogo De Burdeos">Dogo De Burdeos</option>
                                                                                            <option value="Dogo De Cerdeña">Dogo De Cerdeña</option>
                                                                                            <option value="Dogo Del Tíbet">Dogo Del Tíbet</option>
                                                                                            <option value="Dogo Guatemalteco">Dogo Guatemalteco</option>
                                                                                            <option value="Dogo Mallorquín">Dogo Mallorquín</option>
                                                                                            <option value="Epagneul Papillón">Epagneul Papillón</option>
                                                                                            <option value="Esquimal Americano">Esquimal Americano</option>
                                                                                            <option value="Esquimal Canadiense">Esquimal Canadiense</option>
                                                                                            <option value="Europeo">Europeo </option>
                                                                                            <option value="Fila Brasileiro">Fila Brasileiro</option>
                                                                                            <option value="Fox Terrier">Fox Terrier</option>
                                                                                            <option value="Fox Terrier De Pelo Duro">Fox Terrier De Pelo Duro</option>
                                                                                            <option value="Fox Terrier De Pelo Liso">Fox Terrier De Pelo Liso</option>
                                                                                            <option value="Foxhound Americano">Foxhound Americano</option>
                                                                                            <option value="Foxhound Inglés">Foxhound Inglés</option>
                                                                                            <option value="Galgo Español">Galgo Español</option>
                                                                                            <option value="Galgo Inglés">Galgo Inglés</option>
                                                                                            <option value="Glen Of Imaal Terrier">Glen Of Imaal Terrier</option>
                                                                                            <option value="Golden Retriever">Golden Retriever</option>
                                                                                            <option value="Gran Boyero Suizo">Gran Boyero Suizo</option>
                                                                                            <option value="Gran Danés">Gran Danés</option>
                                                                                            <option value="Gran Sabueso Azul De Gascuña">Gran Sabueso Azul De Gascuña</option>
                                                                                            <option value="Grifón">Grifón</option>
                                                                                            <option value="Grifón Azul De Gascuña">Grifón Azul De Gascuña</option>
                                                                                            <option value="Grifón Belga">Grifón Belga</option>
                                                                                            <option value="Grifón De Bruselas">Grifón De Bruselas</option>
                                                                                            <option value="Grifón De Pelo Duro">Grifón De Pelo Duro</option>
                                                                                            <option value="Grifón Korthal">Grifón Korthal</option>
                                                                                            <option value="Grifón Nivernais">Grifón Nivernais</option>
                                                                                            <option value="Grifón Vandeano Basset Pequeño">Grifón Vandeano Basset Pequeño</option>
                                                                                            <option value="Gull Dong">Gull Dong</option>
                                                                                            <option value="Gull Terr">Gull Terr</option>
                                                                                            <option value="Hokkaido">Hokkaido</option>
                                                                                            <option value="Husky Siberiano">Husky Siberiano</option>
                                                                                            <option value="Irish Soft Coated Wheaten Terrier">Irish Soft Coated Wheaten Terrier</option>
                                                                                            <option value="Jack Russell Terrier">Jack Russell Terrier</option>
                                                                                            <option value="Jämthund">Jämthund</option>
                                                                                            <option value="Kangal">Kangal</option>
                                                                                            <option value="Keeshond">Keeshond</option>
                                                                                            <option value="Kerry Blue Terrier">Kerry Blue Terrier</option>
                                                                                            <option value="Kishu">Kishu</option>
                                                                                            <option value="Komondor">Komondor</option>
                                                                                            <option value="Kopov Eslovaco">Kopov Eslovaco</option>
                                                                                            <option value="Kritikos Lagonikos">Kritikos Lagonikos</option>
                                                                                            <option value="Kromfohrländer">Kromfohrländer</option>
                                                                                            <option value="Kuchi">Kuchi</option>
                                                                                            <option value="Kuvasz">Kuvasz</option>
                                                                                            <option value="Kuvasz">Kuvasz</option>
                                                                                            <option value="Labrador Retriever">Labrador Retriever</option>
                                                                                            <option value="Lagotto Romagnolo">Lagotto Romagnolo</option>
                                                                                            <option value="Laika">Laika</option>
                                                                                            <option value="Laika Ruso Europeo">Laika Ruso Europeo</option>
                                                                                            <option value="Lakeland Terrier">Lakeland Terrier</option>
                                                                                            <option value="Lebreles ">Lebreles </option>
                                                                                            <option value="Leonberger">Leonberger</option>
                                                                                            <option value="Lhasa Apso">Lhasa Apso</option>
                                                                                            <option value="Lobero Irlandés">Lobero Irlandés</option>
                                                                                            <option value="Longdog">Longdog</option>
                                                                                            <option value="Lundehund">Lundehund</option>
                                                                                            <option value="Lurcher">Lurcher</option>
                                                                                            <option value="Majorero">Majorero</option>
                                                                                            <option value="Manchester Terrier">Manchester Terrier</option>
                                                                                            <option value="Mastín Americano">Mastín Americano</option>
                                                                                            <option value="Mastín De Borinquen">Mastín De Borinquen</option>
                                                                                            <option value="Mastín De Kumaon">Mastín De Kumaon</option>
                                                                                            <option value="Mastín De Los Alpes">Mastín De Los Alpes</option>
                                                                                            <option value="Mastín Del Pirineo">Mastín Del Pirineo</option>
                                                                                            <option value="Mastín Español">Mastín Español</option>
                                                                                            <option value="Mastín Inglés">Mastín Inglés</option>
                                                                                            <option value="Mastín Napolitano">Mastín Napolitano</option>
                                                                                            <option value="Mastín Tibetano">Mastín Tibetano</option>
                                                                                            <option value="Mestizo">Mestizo</option>
                                                                                            <option value="Montaña De Los Pirineos">Montaña De Los Pirineos</option>
                                                                                            <option value="Mucuchíes">Mucuchíes</option>
                                                                                            <option value="Mudi">Mudi</option>
                                                                                            <option value="Münsterländer Grande">Münsterländer Grande</option>
                                                                                            <option value="Münsterländer Pequeño">Münsterländer Pequeño</option>
                                                                                            <option value="Otterhound">Otterhound</option>
                                                                                            <option value="Pachón Navarro">Pachón Navarro</option>
                                                                                            <option value="Parson Russell Terrier">Parson Russell Terrier</option>
                                                                                            <option value="Pastor Alemán">Pastor Alemán</option>
                                                                                            <option value="Pastor Americano">Pastor Americano</option>
                                                                                            <option value="Pastor Belga (Malinois)">Pastor Belga (Malinois)</option>
                                                                                            <option value="Pastor Belga Groenendael">Pastor Belga Groenendael</option>
                                                                                            <option value="Pastor Belga Laekenois">Pastor Belga Laekenois</option>
                                                                                            <option value="Pastor Belga Tervuerense">Pastor Belga Tervuerense</option>
                                                                                            <option value="Pastor Blanco Suizo">Pastor Blanco Suizo</option>
                                                                                            <option value="Pastor Catalán">Pastor Catalán</option>
                                                                                            <option value="Pastor Caucásico">Pastor Caucásico</option>
                                                                                            <option value="Pastor De Anatolia">Pastor De Anatolia</option>
                                                                                            <option value="Pastor De Asia Central">Pastor De Asia Central</option>
                                                                                            <option value="Pastor De Beauce">Pastor De Beauce</option>
                                                                                            <option value="Pastor De Bosnia-Herzegovina Y Croacia">Pastor De Bosnia-Herzegovina Y Croacia</option>
                                                                                            <option value="Pastor De Brie">Pastor De Brie</option>
                                                                                            <option value="Pastor De Los Cárpatos">Pastor De Los Cárpatos</option>
                                                                                            <option value="Pastor De Los Pirineos">Pastor De Los Pirineos</option>
                                                                                            <option value="Pastor De Maremma">Pastor De Maremma</option>
                                                                                            <option value="Pastor De Tatra">Pastor De Tatra</option>
                                                                                            <option value="Pastor De Valée">Pastor De Valée</option>
                                                                                            <option value="Pastor Del Sur De Rusia">Pastor Del Sur De Rusia</option>
                                                                                            <option value="Pastor Ganadero Australiano">Pastor Ganadero Australiano</option>
                                                                                            <option value="Pastor Garafiano">Pastor Garafiano</option>
                                                                                            <option value="Pastor Holandés">Pastor Holandés</option>
                                                                                            <option value="Pastor Inglés">Pastor Inglés</option>
                                                                                            <option value="Pastor Lapón">Pastor Lapón</option>
                                                                                            <option value="Pastor Leonés">Pastor Leonés</option>
                                                                                            <option value="Pastor Ovejero Australiano">Pastor Ovejero Australiano</option>
                                                                                            <option value="Pastor Vasco">Pastor Vasco</option>
                                                                                            <option value="Pekinés">Pekinés</option>
                                                                                            <option value="Pequeño Perro León">Pequeño Perro León</option>
                                                                                            <option value="Pequeño Sabueso De Suiza">Pequeño Sabueso De Suiza</option>
                                                                                            <option value="Perdiguero De Burgos">Perdiguero De Burgos</option>
                                                                                            <option value="Perdiguero De Drenthe">Perdiguero De Drenthe</option>
                                                                                            <option value="Perdiguero Frisón">Perdiguero Frisón</option>
                                                                                            <option value="Perdiguero Portugués">Perdiguero Portugués</option>
                                                                                            <option value="Perro Cimarrón Uruguayo">Perro Cimarrón Uruguayo</option>
                                                                                            <option value="Perro De Agua Americano">Perro De Agua Americano</option>
                                                                                            <option value="Perro De Agua Cantábrico">Perro De Agua Cantábrico</option>
                                                                                            <option value="Perro De Agua Español">Perro De Agua Español</option>
                                                                                            <option value="Perro De Agua Frisón">Perro De Agua Frisón</option>
                                                                                            <option value="Perro De Agua Irlandés">Perro De Agua Irlandés</option>
                                                                                            <option value="Perro De Canaán">Perro De Canaán</option>
                                                                                            <option value="Perro De Groenlandia">Perro De Groenlandia</option>
                                                                                            <option value="Perro De Montaña De Los Pirineos">Perro De Montaña De Los Pirineos</option>
                                                                                            <option value="Perro De Muestra Alemán De Pelo Largo">Perro De Muestra Alemán De Pelo Largo</option>
                                                                                            <option value="Perro De Osos De Carelia">Perro De Osos De Carelia</option>
                                                                                            <option value="Perro De Pastor Mallorquín">Perro De Pastor Mallorquín</option>
                                                                                            <option value="Perro De San Huberto">Perro De San Huberto</option>
                                                                                            <option value="Perro Lobo Checoslovaco">Perro Lobo Checoslovaco</option>
                                                                                            <option value="Perro Pastor De Las Islas Shetland">Perro Pastor De Las Islas Shetland</option>
                                                                                            <option value="Perro Sin Pelo Del Perú">Perro Sin Pelo Del Perú</option>
                                                                                            <option value="Persa">Persa</option>
                                                                                            <option value="Pharaoh Hound">Pharaoh Hound</option>
                                                                                            <option value="Pinscher Alemán">Pinscher Alemán</option>
                                                                                            <option value="Pinscher Miniatura">Pinscher Miniatura</option>
                                                                                            <option value="Pit Bull Terrier Americano">Pit Bull Terrier Americano</option>
                                                                                            <option value="Podenco Andaluz">Podenco Andaluz</option>
                                                                                            <option value="Podenco Andaluz Maneto">Podenco Andaluz Maneto</option>
                                                                                            <option value="Podenco Canario">Podenco Canario</option>
                                                                                            <option value="Podenco Ibicenco">Podenco Ibicenco</option>
                                                                                            <option value="Podenco Portugués">Podenco Portugués</option>
                                                                                            <option value="Pointer Inglés">Pointer Inglés</option>
                                                                                            <option value="Pomerania">Pomerania</option>
                                                                                            <option value="Poodle Mediano">Poodle Mediano</option>
                                                                                            <option value="Poodle Toy">Poodle Toy</option>
                                                                                            <option value="Porcelana">Porcelana</option>
                                                                                            <option value="Presa Canario">Presa Canario</option>
                                                                                            <option value="Pudelpointer">Pudelpointer</option>
                                                                                            <option value="Pug">Pug</option>
                                                                                            <option value="Puli">Puli</option>
                                                                                            <option value="Pumi">Pumi</option>
                                                                                            <option value="Rafeiro Do Alentejo">Rafeiro Do Alentejo</option>
                                                                                            <option value="Rastreador Brasileño">Rastreador Brasileño</option>
                                                                                            <option value="Ratonero Bodeguero Andaluz">Ratonero Bodeguero Andaluz</option>
                                                                                            <option value="Ratonero Mallorquín">Ratonero Mallorquín</option>
                                                                                            <option value="Retriever De Chesapeake">Retriever De Chesapeake</option>
                                                                                            <option value="Retriever De Pelo Rizado">Retriever De Pelo Rizado</option>
                                                                                            <option value="Ridgeback Tailandés">Ridgeback Tailandés</option>
                                                                                            <option value="Rottweiler">Rottweiler</option>
                                                                                            <option value="Sabuesos ">Sabuesos </option>
                                                                                            <option value="Saluki">Saluki</option>
                                                                                            <option value="Samoyedo">Samoyedo</option>
                                                                                            <option value="San Bernardo">San Bernardo</option>
                                                                                            <option value="Schapendoes">Schapendoes</option>
                                                                                            <option value="Schipperke">Schipperke</option>
                                                                                            <option value="Schnauzer Mediano">Schnauzer Mediano</option>
                                                                                            <option value="Schnauzer Mini">Schnauzer Mini</option>
                                                                                            <option value="Sealyham Terrier">Sealyham Terrier</option>
                                                                                            <option value="Setter Escocés">Setter Escocés</option>
                                                                                            <option value="Setters ">Setters </option>
                                                                                            <option value="Shar Pei">Shar Pei</option>
                                                                                            <option value="Shiba Inu">Shiba Inu</option>
                                                                                            <option value="Shih Tzu">Shih Tzu</option>
                                                                                            <option value="Siamés">Siamés</option>
                                                                                            <option value="Skye Terrier">Skye Terrier</option>
                                                                                            <option value="Spaniels ">Spaniels </option>
                                                                                            <option value="Spinone">Spinone</option>
                                                                                            <option value="Spitz ">Spitz </option>
                                                                                            <option value="Staffordshire Bull Terrier">Staffordshire Bull Terrier</option>
                                                                                            <option value="Tejonero De Westfalia">Tejonero De Westfalia</option>
                                                                                            <option value="Tekel">Tekel</option>
                                                                                            <option value="Terranova">Terranova</option>
                                                                                            <option value="Terrier Alemán">Terrier Alemán</option>
                                                                                            <option value="Terrier Americano Sin Pelo">Terrier Americano Sin Pelo</option>
                                                                                            <option value="Terrier Brasileño">Terrier Brasileño</option>
                                                                                            <option value="Terrier Checo">Terrier Checo</option>
                                                                                            <option value="Terrier Chileno">Terrier Chileno</option>
                                                                                            <option value="Terrier De Norfolk">Terrier De Norfolk</option>
                                                                                            <option value="Terrier De Norwich">Terrier De Norwich</option>
                                                                                            <option value="Terrier Escocés">Terrier Escocés</option>
                                                                                            <option value="Terrier Galés">Terrier Galés</option>
                                                                                            <option value="Terrier Irlandés">Terrier Irlandés</option>
                                                                                            <option value="Terrier Japonés">Terrier Japonés</option>
                                                                                            <option value="Terrier Ruso Negro">Terrier Ruso Negro</option>
                                                                                            <option value="Terrier Tibetano">Terrier Tibetano</option>
                                                                                            <option value="Tosa Inu">Tosa Inu</option>
                                                                                            <option value="Toy Spaniel Inglés">Toy Spaniel Inglés</option>
                                                                                            <option value="Toy Terrier ">Toy Terrier </option>
                                                                                            <option value="Vikhan">Vikhan</option>
                                                                                            <option value="Vizsla">Vizsla</option>
                                                                                            <option value="Volpino Italiano">Volpino Italiano</option>
                                                                                            <option value="West Highland White Terrier">West Highland White Terrier</option>
                                                                                            <option value="Whippet">Whippet</option>
                                                                                            <option value="Xoloitzcuintle">Xoloitzcuintle</option>
                                                                                            <option value="Yorkshire Terrier">Yorkshire Terrier</option>
                                                                                            <option value="Šarplaninac">Šarplaninac</option>
                                                                                  </select>                                    
                                    </div>
                                </div>
                            </div>
                        <div class="row sinpadding">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">COLOR</label>
                                    <input id="vih_e" name="vih_e" type="text" class="form-control" />                                    
                                </div>
                            </div>
                        </div>
                        <!--<div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">PESO</label>
                                    <input id="peso_e" name="peso_e" type="text" class="form-control" />                    
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">ALTURA</label>
                                    <input id="altura_e" name="altura_e" type="text" class="form-control" />                    
                                </div>
                            </div>
                        </div>-->
                        <!--<div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">ALERGIA</label>
                                    <input id="alergia_e" name="alergia_e" type="text" class="form-control" />             
                                </div>
                            </div>
                        </div>-->
                        <!--<div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">MEDICAMENTO ACTUAL</label>
                                    <input id="medicamento_e" name="medicamento_e" type="text" class="form-control" />                      
                                </div>
                            </div>
                        </div>-->
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">OBSERVACIONES</label>
                                    <input id="enfermedad_e" name="enfermedad_e" type="text" class="form-control" />            
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                @include('../personas/avatar')
            </div>
            <br>
            <div class="row">
                <ul class="nav nav-pills nav-pills-icons nav-pills-info nav-stacked" role="tablist">
                    <li class="active">
                        <a href="#1" role="tab" data-toggle="tab">
                            <i class="material-icons">info</i>Básica
                        </a>
                    </li>
                     @role(['administrador', 'doctor']) <!-- al terminar esta sección debemos manejar estos datos con abilidades y persmisos a cada perfil "administrador", "doctor", 
                    "recepcionista", "paciente"-->
                    <li>
                        <a href="#2" role="tab" data-toggle="tab">
                            <i class="material-icons">fingerprint</i>Personal
                        </a>
                    </li>
                    @endrole
                </ul>
            </div>
        </div>
    </div>
</div>