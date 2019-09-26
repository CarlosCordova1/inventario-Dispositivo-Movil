CREATE OR REPLACE PACKAGE API_PQDPM_1_0 AS
-- DPM -- Dispositivos Movil
gobj json; --variable global de tipo json

FUNCTION INVOCA(pjsontxt in varchar2) return clob;

END API_PQDPM_1_0;
/


CREATE OR REPLACE PACKAGE BODY API_PQDPM_1_0 AS

   FUNCTION VJSON (pjsontxt in varchar2) RETURN boolean IS
        scanner_exception exception;
        pragma exception_init(scanner_exception, -20100);
        parser_exception exception;
        pragma exception_init(parser_exception, -20101);
        jext_exception exception;
        pragma exception_init(jext_exception, -20110);
    BEGIN
        gobj:=json(pjsontxt);
        return true;
    EXCEPTION
        when scanner_exception or parser_exception or jext_exception then return false;
    END;
/*  __________________________________________________________________________________________________  */

    PROCEDURE DATAVARAPI (pvar in  APP.FMT_VARIABLES.IDTVAR%TYPE,
                          pval out APP.FMT_VARIABLES.VALOR%TYPE,
                          pdes out APP.FMT_VARIABLES.DESCRIPCION%TYPE) IS
    BEGIN
        select trim(valor),trim(descripcion) into pval,pdes from APP.FMT_VARIABLES where idtvar=pvar;
    EXCEPTION
        when NO_DATA_FOUND then
            pval:=null;    pdes:=null;
        when OTHERS then
            pval:=null;    pdes:=null;
    END;
/*  __________________________________________________________________________________________________  */

    FUNCTION JMSGERR (pcgo in APP.FMT_VARIABLES.IDTVAR%TYPE) RETURN varchar2 IS
        lcgo APP.FMT_VARIABLES.IDTVAR%TYPE;
        vmsg APP.FMT_VARIABLES.VALOR%TYPE;
        vdes APP.FMT_VARIABLES.DESCRIPCION%TYPE;
    BEGIN
        gobj:=json();
        gobj.put('code',pcgo);
        if substr(pcgo,1,2)='DB' then lcgo:='DB000'; else lcgo:=pcgo; end if;
        datavarapi(lcgo,vmsg,vdes);
        gobj.put('message',nvl(vmsg,'null'));
        gobj.put('description',nvl(vdes,'null'));
        RETURN gobj.to_char();
    END;

FUNCTION carcamos (vfolio in number)  RETURN clob IS

	cadena			clob;
	temp			json;
	clientenuevo			json;
    celularactivo			json;
    radioactivo			json;
    datopdf json;
    clienteEditado			json;
    simactivo json;
     clienteEditado2			json;
	respuesta		json;
	datacliente		json;
    cont   number (10);
    begin 
    respuesta :=json();
    
    -- --------------------------------------------------------------------
    declare
    CURSOR CATALOGO IS
SELECT * FROM app.DPM_VARS WHERE tpovar  in ('DPM');
			BEGIN
        clientenuevo :=json();
        cont:=0;
   FOR ind IN CATALOGO LOOP
    cont:= cont+1;
          temp :=json();
                temp.put('idtvar',ind.idtvar);
                -- temp.put('CODANM',ind.CODANM);
                 temp.put('valor',ind.valor);
              clientenuevo.put(cont,temp);

         END LOOP;
end;
-----------------------------------------------------------------------------
    -- --------------------------------------------------------------------
    declare
    CURSOR CATALOGO IS
SELECT * FROM app.DPM_VARS WHERE tpovar  in ('STATUS');
			BEGIN
        clienteEditado :=json();
        cont:=0;
   FOR ind IN CATALOGO LOOP
    cont:= cont+1;
          temp :=json();
        temp.put('idtvar',ind.idtvar);
                -- temp.put('CODANM',ind.CODANM);
                 temp.put('valor',ind.valor);
              clienteEditado.put(cont,temp);

         END LOOP;
end;
-----------------------------------------------------------------------------
    -- --------------------------------------------------------------------
    declare
    CURSOR CATALOGO IS
SELECT * FROM app.DPM_VARS WHERE tpovar  in ('COMPANY');
			BEGIN
        clienteEditado2 :=json();
        cont:=0;
   FOR ind IN CATALOGO LOOP
    cont:= cont+1;
          temp :=json();
        temp.put('idtvar',ind.idtvar);
                -- temp.put('CODANM',ind.CODANM);
                 temp.put('valor',ind.valor);
              clienteEditado2.put(cont,temp);

         END LOOP;
end;
-----------------------------------------------------------------------------
  -- --------------------------------------------------------------------
    declare
    CURSOR CATALOGO IS
SELECT * FROM app.dpm_equi WHERE IDTDMP  in ('MOVIL') ;
			BEGIN
        celularactivo :=json();
        cont:=0;
   FOR ind IN CATALOGO LOOP
    cont:= cont+1;
          temp :=json();
        temp.put('SERIE',ind.SERIE);
                -- temp.put('CODANM',ind.CODANM);
               --  temp.put('valor',ind.valor);
              celularactivo.put(cont,temp);

         END LOOP;
end;
-----------------------------------------------------------------------------
  -- --------------------------------------------------------------------
    declare
    CURSOR CATALOGO IS
SELECT * FROM app.dpm_equi WHERE IDTDMP  in ('RADIO') ;
			BEGIN
        radioactivo :=json();
        cont:=0;
   FOR ind IN CATALOGO LOOP
    cont:= cont+1;
          temp :=json();
        temp.put('IDMOVIL',ind.IDMOVIL);
                -- temp.put('CODANM',ind.CODANM);
               --  temp.put('valor',ind.valor);
              radioactivo.put(cont,temp);

         END LOOP;
end;
-----------------------------------------------------------------------------
 -- --------------------------------------------------------------------
    declare
    CURSOR CATALOGO IS
SELECT * FROM app.dpm_equi WHERE IDTDMP  in ('SIM') ;
			BEGIN
        simactivo :=json();
        cont:=0;
   FOR ind IN CATALOGO LOOP
    cont:= cont+1;
          temp :=json();
        temp.put('sim',ind.sim);
                -- temp.put('CODANM',ind.CODANM);
               --  temp.put('valor',ind.valor);
              simactivo.put(cont,temp);

         END LOOP;
end;
-----------------------------------------------------------------------------
 -- --------------------------------------------------------------------
    declare
    CURSOR CATALOGO IS
SELECT D.IDTEVA,D.IDTEQU,D.IDTUSERLOGIN,D.IDTEMPLEADO,D.FECHAIN,D.FECHAUP,D.EDO,D.OBSERVACIONES,D.IDTEVAASOCI,D.NOMBRE,D.USERSTATUS,D.USERZONA,D.USERAREA,D.USERDEPA,D.FECHAENTREGA,
   D.USUARIO,D.CUENTA,D.VPASSWORD,D.UBICACION,D.COMENTARIOS,
              (SELECT l.display_name FROM app.lgn_user l where l.id_user=D.IDTUSERLOGIN) USERLOGIN ,
                (SELECT l.display_name FROM app.lgn_user l where l.id_user=D.IDTUSERLOGIN2) USERLOGIN2 ,
                E.IDTDMP, E.IDMOVIL, E.SIM, E.TELEFONO, E.SERIE, E.COMPANIA, E.MODELO,E.COLOR,E.FUNDA,E.MICA,E.CARGADOR
               FROM app.dpm_eval D, APP.DPM_EQUI E where D.IDTEQU=E.IDTEQU AND  D.IDTEVA =vfolio and e.idtdmp IN ('MOVIL','SIM') ;

			BEGIN
        datopdf :=json();
        cont:=0;
   FOR ind IN CATALOGO LOOP
    cont:= cont+1;
          temp :=json();
                temp.put('IDTEVA',ind.IDTEVA);
         temp.put('IDTEQU',ind.IDTEQU);
         temp.put('IDTDMP',ind.IDTDMP);
          temp.put('IDMOVIL',ind.IDMOVIL);
          temp.put('SERIE',ind.SERIE);
           temp.put('MODELO',ind.MODELO);
          temp.put('COMPANIA',ind.COMPANIA);
           temp.put('SIM',ind.SIM);
           


temp.put('FUNDA',ind.FUNDA);
temp.put('MICA',ind.MICA);
temp.put('CARGADOR',ind.CARGADOR);
            temp.put('COLOR',ind.COLOR);
           temp.put('TELEFONO',ind.TELEFONO);
            temp.put('IDTEMPLEADO',ind.IDTEMPLEADO);
             temp.put('FECHA',to_char(ind.FECHAIN,'MM/DD/YYYY'));
              temp.put('FECHAUPD',to_char(ind.FECHAUP,'MM/DD/YYYY HH24:MI'));
               temp.put('FECHAENTREGA',to_char(ind.FECHAENTREGA,'MM/DD/YYYY HH24:MI'));
              --  temp.put('PLAZOFORZOSO',to_char(ind.PLAZOFORZOSO,'MM/DD/YYYY HH24:MI'));
              temp.put('hora',to_char(ind.FECHAIN,'HH24:MI'));
              temp.put('EDO',ind.edo);
              if ind.edo='NVO' then 
                  temp.put('EDO2','Asignado');
                  else 
                  temp.put('EDO2','DesAsignado');
                  end if;
                  temp.put('OBSERVACIONES',ind.OBSERVACIONES);
                    temp.put('COMENTARIOS',ind.COMENTARIOS);
                 temp.put('IDTEVAASOCI',ind.IDTEVAASOCI);
                  temp.put('NOMBRE',ind.NOMBRE);
                   temp.put('USERSTATUS',ind.USERSTATUS);
                    temp.put('USERZONA',ind.USERZONA);
                     temp.put('USERAREA',ind.USERAREA);
                      temp.put('USERDEPA',ind.USERDEPA);
                       temp.put('USUARIO',ind.USUARIO);
                        temp.put('CUENTA',ind.CUENTA);
                         temp.put('VPASSWORD',ind.VPASSWORD);
                          temp.put('UBICACION',ind.UBICACION);
                           temp.put('USERLOGIN',ind.USERLOGIN);
                           temp.put('USERLOGIN2',ind.USERLOGIN2);
                           
                        -- --------------------------------------------------------------------
                            declare
                             temp3 json;
                              temp4 json;
                               cont2 number;
                            CURSOR CATALOGO IS
                        SELECT
                     IDTEVA,  NOMBRE,IDTEMPLEADO            
               FROM dpm_eval WHERE IDTEVAASOCI=ind.IDTEVAASOCI 
               UNION
                SELECT
                     IDTEVA,  NOMBRE,IDTEMPLEADO            
               FROM dpm_eval WHERE IDTEVA=ind.IDTEVAASOCI order by IDTEVA asc;
                                    BEGIN
                                temp3 :=json();
                                 temp4 :=json();
                                cont2:=0;
                           FOR ind2 IN CATALOGO LOOP
                            cont2:= cont2+1;
                                  temp3 :=json();
                                temp3.put('IDTEVA',ind2.IDTEVA);
                                     temp3.put('NOMBRE',ind2.NOMBRE);
                                     temp3.put('IDTEMPLEADO',ind2.IDTEMPLEADO);
                                      temp4.put(cont2,temp3);
                        
                                 END LOOP;
                                 temp.put('relacion',temp4);
                        end;
               -----------------------------------------------------------------------------
                           
    
              datopdf.put(cont,temp);

         END LOOP;
end;
-----------------------------------------------------------------------------
respuesta.put('datopdf',datopdf);
	respuesta.put('radioactivo',radioactivo);
	respuesta.put('celularactivo',celularactivo);
    respuesta.put('simactivo',simactivo);
	respuesta.put('tipomovil',clientenuevo);
	respuesta.put('estatus',clienteEditado);
    respuesta.put('company',clienteEditado2);
	respuesta.put('status',1);
	respuesta.put('msg','todo ok');

	cadena := empty_clob();
	dbms_lob.createtemporary(cadena, true);
	respuesta.to_clob(cadena, true);
	--dbms_output.put_line(cadena);
	--dbms_lob.freetemporary(cadena);
	RETURN '['||cadena||']';
EXCEPTION
	when NO_DATA_FOUND then
		respuesta:=json();
		respuesta.put('status',0);
		respuesta.put('msg','No se encontro datos');
		return '['||respuesta.to_char()||']';
	when OTHERS then
		respuesta:=json();
		respuesta.put('msg','ocurrio un error.'|| ' lineaError -> '||DBMS_UTILITY.Format_Error_BackTrace );
		respuesta.put('error',SQLERRM);
		respuesta.put('lineaError',' lineaError -> '||DBMS_UTILITY.Format_Error_BackTrace);
		respuesta.put('status',0);
		return '['||respuesta.to_char()||']';
END;


 -- --------------------------------------------------------------------------------------------------
 -- Función que devuelve la información de los operadores
 -- --------------------------------------------------------------------------------------------------
 FUNCTION operadores RETURN CLOB IS
 vjson_list1  json_list;
 vjson1       json;
 vjson2       json;
 voperadores  clob;
 CURSOR coperadores IS
    SELECT IDTOPE, NOMBRE, PATERNO, MATERNO, ROL FROM APP.CCO_OPER where ROL='C';
 BEGIN
     vjson1      := json();
     vjson2      := json();
     vjson_list1 := json_list();
     FOR voperador IN coperadores LOOP
        vjson2.put('idOper',voperador.idtope);
       -- vjson2.put('operador', voperador.nombre||' '||voperador.paterno||' '||voperador.materno);
         vjson2.put('operador', voperador.paterno||' '||voperador.materno ||' '||voperador.nombre);
        vjson2.put('rol',voperador.rol);
        vjson_list1.append(vjson2.to_json_value);
     END LOOP;
     --vjson1.put('Operadores', vjson_list1.to_json_value);
     dbms_lob.createtemporary( voperadores, true);
     --vjson1.to_clob(voperadores);
     vjson_list1.to_clob(voperadores);
 RETURN voperadores;
 END operadores;

 -- --------------------------------------------------------------------------------------------------
 /*  __________________________________________________________________________________________________  */

    FUNCTION ValidaToken(token in varchar2)  RETURN boolean is
            --desdifrar VARCHAR2(4000);
            fecha varchar2(40);
            jsontoken json;
            BEGIN
            jsontoken:=json(token);

            --desdifrar:=UTILERIA_CIFRAR.DESCIFRAR(token);
          --if not vjson(desdifrar) then return false; end if;

        fecha:=json_ext.get_string(jsontoken,'timeNow');
     if fecha is null then return false; else

    if fecha=to_char(SYSDATE) then 
     return true;
     else return false; end if; 
     end if;
      --RETURN true;
    EXCEPTION
        when OTHERS then
            return false;    
    END;
/*  __________________________________________________________________________________________________  */
-- --------------------------------------------------------------------------------------------------
 FUNCTION insertDesasinacion (datavalues json,oratkn varchar2) RETURN CLOB IS
 cadena            clob;
    respuesta        json;
     cargautil        json;
     equipo json_list;
     text json_list;
  jsondescifrar json;
  jsonservicios json;
  jsonservicios_dpm json;
   descifrar VARCHAR2(4000);
      agente_IDTAGT VARCHAR2(20);
 iduser number(10);
       servicios_dpm_admin number(10);
         servicios_dpm_operativo number(10);

        idasignacon number (10);
         idequippo number (10);
          statusequipo varchar2 (30);
             vedo varchar2 (2);
            vobservacion varchar2 (300);
                     BEGIN
       descifrar:=UTILERIA_CIFRAR.DESCIFRAR(oratkn);
           respuesta :=json();
        jsondescifrar:= json(descifrar);
         if ValidaToken(descifrar) then 
            agente_IDTAGT:=json_ext.get_string(jsondescifrar,'IDTAGT');
              iduser:=json_ext.get_number(jsondescifrar,'iduser');
          jsonservicios:=json_ext.get_json(jsondescifrar,'servicios');
          jsonservicios_dpm:=json_ext.get_json(jsonservicios,'cco');
                    servicios_dpm_admin:=json_ext.get_number(jsonservicios_dpm,'admin');
                     servicios_dpm_operativo:=json_ext.get_number(jsonservicios_dpm,'operativo');
             respuesta.put('servicios_dpm_admin',servicios_dpm_admin);
   if servicios_dpm_operativo=1 then 
    respuesta.put('datavalues',datavalues);
      respuesta.put('status',1);
       -- cargautil:=json(json_ext.get_string(datavalues,'values'));
         respuesta.put('cargautil',cargautil);
         statusequipo :=json_ext.get_string(datavalues,'estatus');
          idasignacon :=to_number(json_ext.get_string(datavalues,'id'));
          idequippo :=to_number(json_ext.get_string(datavalues,'equipo'));
          
              vobservacion :=json_ext.get_string(datavalues,'message3');
            ---------------------------------------------- ------------------------------------
            UPDATE "APP"."DPM_EVAL" SET IDTUSERLOGIN2 = iduser, EDO='DAS', FECHAUP=SYSDATE,COMENTARIOS=vobservacion WHERE IDTEVA =idasignacon and IDTEQU=idequippo and EDO='NVO';
                commit;
                                                                                     
                                       
     respuesta.put('msg','Datos insertados correctamente');
    else
      respuesta.put('permiso','negado, registrese como operativo');
       respuesta.put('status',0);
    end if;

     -- respuesta.put('validaarchivo',temp2);
else
    respuesta.put('status',0);
             respuesta.put('error','Token expirado');
                    respuesta.put('msg','No se pudo ingresar dato, inicie sesion nuevamente');
    end if;




    cadena := empty_clob();
    dbms_lob.createtemporary(cadena, true);
    respuesta.to_clob(cadena, true);

    RETURN '['||cadena||']';
EXCEPTION
    when NO_DATA_FOUND then
        respuesta:=json();
        respuesta.put('status',0);
        respuesta.put('msg','No se encontro datos');
        respuesta.put('error',SQLERRM);
        respuesta.put('lineaError',' lineaError -> '||DBMS_UTILITY.Format_Error_BackTrace);
        return '['||respuesta.to_char()||']';
    when OTHERS then
        respuesta:=json();
        respuesta.put('msg','ocurrio un error.'|| ' lineaError -> '||DBMS_UTILITY.Format_Error_BackTrace );
        respuesta.put('error',SQLERRM);
        respuesta.put('lineaError',' lineaError -> '||DBMS_UTILITY.Format_Error_BackTrace);
        respuesta.put('status',0);
        return '['||respuesta.to_char()||']';
 END insertDesasinacion;
 -- --------------------------------------------------------------------------------------------------
 -- --------------------------------------------------------------------------------------------------
 FUNCTION insertDato (datavalues json,oratkn varchar2) RETURN CLOB IS
 cadena            clob;
    respuesta        json;
     cargautil        json;
     equipo json_list;
     text json_list;
  jsondescifrar json;
  jsonservicios json;
  jsonservicios_dpm json;
   descifrar VARCHAR2(4000);
      agente_IDTAGT VARCHAR2(20);
 iduser number(10);
       servicios_dpm_admin number(10);
         servicios_dpm_operativo number(10);

         fechaval date:=sysdate;
          vIDTCAR varchar2 (30);
         idequippo number (10);
          idoperadorCarcamo number (10);
           idoperadorTelemetria number (10);
            dm_m_tipo varchar2 (30);
             vedo varchar2 (2);
               dm_m_sim varchar2 (30);
                dm_m_serie varchar2 (30);
                 dm_m_imei varchar2 (30);
                  dm_m_tel varchar2 (30);
                   dm_m_idcompleto varchar2 (30);
                    dm_m_company varchar2 (30);
                    dm_m_status varchar2 (30);
                    
                      dm_m_depa varchar2 (30);
                       dm_m_centroc varchar2 (30);
                        dm_m_modelo varchar2 (30);
                         dm_m_color varchar2 (30);
                          dm_m_funda varchar2 (30);
                           dm_m_mica varchar2 (30);
                            dm_m_cargador varchar2 (30);
                            
                            dm_m_fecharef varchar2 (30);
                             dm_m_plazoforzoso varchar2 (30);
                            
                             dm_r_id varchar2 (30);
                              dm_r_serie varchar2 (30);
                               dm_r_marca varchar2 (30);
                                dm_r_modelo varchar2 (30);
                                 dm_r_status varchar2 (30);
                                  dm_r_fecharef varchar2 (30);
                                  
                                    dm_m_marcarapida varchar2 (30);
                                   dm_s_status varchar2 (30);
                                  dm_s_fecharef varchar2 (30);
                vobservacion varchar2 (300);
                     BEGIN
       descifrar:=UTILERIA_CIFRAR.DESCIFRAR(oratkn);
           respuesta :=json();
        jsondescifrar:= json(descifrar);
         if ValidaToken(descifrar) then 

            agente_IDTAGT:=json_ext.get_string(jsondescifrar,'IDTAGT');
              iduser:=json_ext.get_number(jsondescifrar,'iduser');
          jsonservicios:=json_ext.get_json(jsondescifrar,'servicios');
          jsonservicios_dpm:=json_ext.get_json(jsonservicios,'cco');
                    servicios_dpm_admin:=json_ext.get_number(jsonservicios_dpm,'admin');
                     servicios_dpm_operativo:=json_ext.get_number(jsonservicios_dpm,'operativo');
             respuesta.put('servicios_dpm_admin',servicios_dpm_admin);
   if servicios_dpm_operativo=1 then 
    respuesta.put('datavalues',datavalues);
      respuesta.put('status',1);
        cargautil:=json(json_ext.get_string(datavalues,'values'));
         respuesta.put('cargautil',cargautil);
         dm_m_tipo :=json_ext.get_string(cargautil,'dm_m_tipo');
          idoperadorcarcamo :=json_ext.get_number(cargautil,'operador');
         --  vIDTCAR :=json_ext.get_string(cargautil,'carcamo');
              vobservacion :=json_ext.get_string(cargautil,'observaciones');
          idoperadortelemetria :=iduser;
          respuesta.put('dm_m_tipo',dm_m_tipo);
         --equipo  :=json_list(cargautil.get('equipo'));
           text  :=json_list(cargautil.get('text'));
                  ------------------------------------
                                 /* FOR i IN 1 .. equipo.COUNT
                                          loop                                                                               
                                          -- respuesta.put('equipo_'||json_ext.get_string(json(equipo.get(i)),'id'),json_ext.get_string(json(equipo.get(i)),'id'));
                                          vedo:=json_ext.get_string(json(equipo.get(i)),'value');
                                           INSERT INTO cco_eval (IDTEQU,IDTOPECAR,IDTOPETEL,FCHEVA,TURNO,EDO,OBSERVACIONES,VIDTCAR)
                                           VALUES(TO_NUMBER(json_ext.get_string(json(equipo.get(i)),'id')),idoperadorcarcamo,idoperadortelemetria,fechaval,vturno,vedo,vobservacion,vIDTCAR);
                                       end loop;
                                       */
                                       
                                         FOR i IN 1 .. text.COUNT
                                          loop                                                                               
                                          -- respuesta.put('text_'||json_ext.get_string(json(text.get(0)),'id'),json_ext.get_string(json(text.get(0)),'id'));
                                          --  respuesta.put('text_'||json_ext.get_string(json(text.get(1)),'id'),json_ext.get_string(json(text.get(1)),'id'));
                                                CASE json_ext.get_string(json(text.get(i)),'id')
                                                WHEN 'dm_m_sim' THEN dm_m_sim:=json_ext.get_string(json(text.get(i)),'value');
                                                  WHEN 'dm_m_serie' THEN dm_m_serie:=json_ext.get_string(json(text.get(i)),'value');
                                                   WHEN 'dm_m_imei' THEN dm_m_imei:=json_ext.get_string(json(text.get(i)),'value');
                                                   WHEN 'dm_m_tel' THEN dm_m_tel:=json_ext.get_string(json(text.get(i)),'value');
                                                     WHEN 'dm_m_idcompleto' THEN dm_m_idcompleto:=json_ext.get_string(json(text.get(i)),'value');
                                                      WHEN 'dm_m_company' THEN dm_m_company:=json_ext.get_string(json(text.get(i)),'value');
                                                      WHEN 'dm_m_status' THEN dm_m_status:=json_ext.get_string(json(text.get(i)),'value');
                                                   
                                                       WHEN 'dm_m_depa' THEN dm_m_depa:=json_ext.get_string(json(text.get(i)),'value');
                                                        WHEN 'dm_m_centroc' THEN dm_m_centroc:=json_ext.get_string(json(text.get(i)),'value');
                                                         WHEN 'dm_m_modelo' THEN dm_m_modelo:=json_ext.get_string(json(text.get(i)),'value');
                                                          WHEN 'dm_m_color' THEN dm_m_color:=json_ext.get_string(json(text.get(i)),'value');
                                                           WHEN 'dm_m_funda' THEN dm_m_funda:=json_ext.get_string(json(text.get(i)),'value');
                                                            WHEN 'dm_m_mica' THEN dm_m_mica:=json_ext.get_string(json(text.get(i)),'value');
                                                             WHEN 'dm_m_cargador' THEN dm_m_cargador:=json_ext.get_string(json(text.get(i)),'value');
                                                         WHEN 'dm_m_fecharef' THEN dm_m_fecharef:=json_ext.get_string(json(text.get(i)),'value');
                                                         WHEN 'dm_m_plazoforzoso' THEN dm_m_plazoforzoso:=json_ext.get_string(json(text.get(i)),'value');
                                                      
                                                           WHEN 'dm_r_id' THEN dm_r_id:=json_ext.get_string(json(text.get(i)),'value');
                                                              WHEN 'dm_r_serie' THEN dm_r_serie:=json_ext.get_string(json(text.get(i)),'value');
                                                                 WHEN 'dm_r_marca' THEN dm_r_marca:=json_ext.get_string(json(text.get(i)),'value');
                                                                    WHEN 'dm_r_modelo' THEN dm_r_modelo:=json_ext.get_string(json(text.get(i)),'value');
                                                                     WHEN 'dm_r_fecharef' THEN dm_r_fecharef:=json_ext.get_string(json(text.get(i)),'value');
                                                                      WHEN 'dm_r_status' THEN dm_r_status:=json_ext.get_string(json(text.get(i)),'value');
                                                                      
                                                                      
                                                                       WHEN 'dm_m_marcarapida' THEN dm_m_marcarapida:=json_ext.get_string(json(text.get(i)),'value');
                                                                       WHEN 'dm_s_status' THEN dm_s_status:=json_ext.get_string(json(text.get(i)),'value');
                                                                        WHEN 'dm_s_fecharef' THEN dm_s_fecharef:=json_ext.get_string(json(text.get(i)),'value');
                                                                        
                                                         else null;
                                                                    
                                                END case;
                                            end loop;
                                       if dm_m_tipo='MOVIL' THEN
                                       
                                             INSERT INTO dpm_equi ( IDTDMP,   MODELO, SERIE,  IMEI,   COMPANIA, COLOR,
                                                            FUNDA,  MICA,  CARGADOR,FECHAIN,    STATUS,  COMENTARIO,  IDTUSERLOGIN,FECHARECEPCION,PLAZOFORZOSO)
                                           VALUES(dm_m_tipo,dm_m_modelo,dm_m_serie,dm_m_imei,dm_m_company,dm_m_color,
                                           dm_m_funda,dm_m_mica,dm_m_cargador,sysdate,dm_m_status,vobservacion,iduser, to_date(dm_m_fecharef,'DD/MM/YYYY HH24:MI'), to_date(dm_m_plazoforzoso,'DD/MM/YYYY HH24:MI'));
                                       COMMIT;
                                        END IF;
                                       IF  dm_m_tipo='RADIO' THEN
                                        INSERT INTO dpm_equi ( IDTDMP, IDMOVIL,  MODELO, SERIE,FECHAIN,    STATUS,  COMENTARIO,  IDTUSERLOGIN,MARCA,FECHARECEPCION)
                                           VALUES(dm_m_tipo,dm_r_id,dm_r_modelo,dm_r_serie,   sysdate,dm_r_status,vobservacion,iduser,dm_r_marca, to_date(dm_r_fecharef,'DD/MM/YYYY HH24:MI'));
                                       COMMIT;
                                      
                                         END IF;
                                           if dm_m_tipo='SIM' THEN
                                       
                                             INSERT INTO dpm_equi ( IDTDMP,  TELEFONO,  IDTELCOMPLETO,  COMPANIA,   FECHAIN,    STATUS,  COMENTARIO,  IDTUSERLOGIN,FECHARECEPCION,SIM,MARCARAPIDA)
                                           VALUES(dm_m_tipo, dm_m_tel,dm_m_idcompleto, dm_m_company,  sysdate,dm_s_status,vobservacion,iduser, to_date(dm_s_fecharef,'DD/MM/YYYY HH24:MI'),dm_m_sim,dm_m_marcarapida);
                                       COMMIT;
                                        END IF;
                                        
                                       
     respuesta.put('msg','Datos insertados correctamente');
    else
      respuesta.put('permiso','negado, registrese como operativo');
       respuesta.put('status',0);
    end if;

     -- respuesta.put('validaarchivo',temp2);
else
    respuesta.put('status',0);
             respuesta.put('error','Token expirado');
                    respuesta.put('msg','No se pudo ingresar dato, inicie sesion nuevamente');
    end if;




    cadena := empty_clob();
    dbms_lob.createtemporary(cadena, true);
    respuesta.to_clob(cadena, true);

    RETURN '['||cadena||']';
EXCEPTION
    when NO_DATA_FOUND then
        respuesta:=json();
        respuesta.put('status',0);
        respuesta.put('msg','No se encontro datos');
        respuesta.put('error',SQLERRM);
        respuesta.put('lineaError',' lineaError -> '||DBMS_UTILITY.Format_Error_BackTrace);
        return '['||respuesta.to_char()||']';
    when OTHERS then
        respuesta:=json();
        respuesta.put('msg','ocurrio un error.'|| ' lineaError -> '||DBMS_UTILITY.Format_Error_BackTrace );
        respuesta.put('error',SQLERRM);
        respuesta.put('lineaError',' lineaError -> '||DBMS_UTILITY.Format_Error_BackTrace);
        respuesta.put('status',0);
        return '['||respuesta.to_char()||']';
 END insertDato;
 -- --------------------------------------------------------------------------------------------------
 -- --------------------------------------------------------------------------------------------------
 FUNCTION insertDato2 (datavalues json,oratkn varchar2) RETURN CLOB IS
 cadena            clob;
    respuesta        json;
     cargautil        json;
     equipo json_list;
     text json_list;
     textequipo json_list;
     textempleado json_list;
  jsondescifrar json;
  jsonservicios json;
  jsonservicios_dpm json;
   descifrar VARCHAR2(4000);
      agente_IDTAGT VARCHAR2(20);
 iduser number(10);
       servicios_dpm_admin number(10);
         servicios_dpm_operativo number(10);

         fechaval date:=sysdate;
          vIDTCAR varchar2 (30);
         idequippo number (10);
          idoperadorCarcamo number (10);
           idoperadorTelemetria number (10);
           idequipo number (10);
            idcurval number (10);
            dm_m_tipo2 varchar2 (30);
             vedo varchar2 (2);
             
             nemmpleado varchar2 (30);
             nuevoequipo varchar2 (30);
                
          dm_a_usuario varchar2 (200);
           dm_a_cuenta varchar2 (30);
           dm_a_password varchar2 (30);
            dm_a_fechaentrega varchar2 (30);
             dm_a_ubicacion varchar2 (30);
              dm_a_equipoanterior varchar2 (30);
                dm_a_plazoforzoso varchar2 (30);
                
                 dm_a_user varchar2 (200);
                 dm_a_estatus varchar2 (20);
                 dm_a_zona varchar2 (50);        
                 dm_a_area varchar2 (100);
                 dm_a_depa varchar2 (100);
           
      
           
                vobservacion varchar2 (300);
                     BEGIN
       descifrar:=UTILERIA_CIFRAR.DESCIFRAR(oratkn);
           respuesta :=json();
        jsondescifrar:= json(descifrar);
         if ValidaToken(descifrar) then 

            agente_IDTAGT:=json_ext.get_string(jsondescifrar,'IDTAGT');
              iduser:=json_ext.get_number(jsondescifrar,'iduser');
          jsonservicios:=json_ext.get_json(jsondescifrar,'servicios');
          jsonservicios_dpm:=json_ext.get_json(jsonservicios,'cco');
                    servicios_dpm_admin:=json_ext.get_number(jsonservicios_dpm,'admin');
                     servicios_dpm_operativo:=json_ext.get_number(jsonservicios_dpm,'operativo');
             respuesta.put('servicios_dpm_admin',servicios_dpm_admin);
   if servicios_dpm_operativo=1 then 
    respuesta.put('datavalues',datavalues);
      respuesta.put('status',1);
        cargautil:=json(json_ext.get_string(datavalues,'values'));
         respuesta.put('cargautil',cargautil);
         dm_m_tipo2 :=json_ext.get_string(cargautil,'dm_m_tipo2');
          idoperadorcarcamo :=json_ext.get_number(cargautil,'operador');
         --  vIDTCAR :=json_ext.get_string(cargautil,'carcamo');
              vobservacion :=json_ext.get_string(cargautil,'observaciones');
          idoperadortelemetria :=iduser;
          respuesta.put('dm_m_tipo2',dm_m_tipo2);
         --equipo  :=json_list(cargautil.get('equipo'));
           text  :=json_list(cargautil.get('text'));
            textequipo  :=json_list(cargautil.get('nuevoequipo'));
             textempleado  :=json_list(cargautil.get('nempleado'));
                  ------------------------------------
                  
                  
                                  -- FOR n IN 1 .. textequipo.COUNT
                                      --    loop                                                                               
                                     nuevoequipo:=json_ext.get_string(json(textequipo.get(1)),'value'); -- serieequipo
                                      if dm_m_tipo2='MOVIL' THEN
                                     select idtequ into idequipo from dpm_equi where serie=nuevoequipo;
                                     else if dm_m_tipo2='RADIO' THEN
                                     select idtequ into idequipo from dpm_equi where idmovil=nuevoequipo;
                                     else if dm_m_tipo2='SIM' THEN
                                     select idtequ into idequipo from dpm_equi where sim=nuevoequipo;
                                     end if;
                                     end if;
                                     end if;
                                     
                                    --   end loop;
                                         FOR i IN 1 .. text.COUNT
                                          loop                                                                                     
                                          --  respuesta.put('text_'||json_ext.get_string(json(text.get(1)),'id'),json_ext.get_string(json(text.get(1)),'id'));
                                                CASE json_ext.get_string(json(text.get(i)),'id')
                                                WHEN 'dm_a_usuario' THEN dm_a_usuario:=json_ext.get_string(json(text.get(i)),'value');
                                                  WHEN 'dm_a_cuenta' THEN dm_a_cuenta:=json_ext.get_string(json(text.get(i)),'value');
                                                   WHEN 'dm_a_password' THEN dm_a_password:=json_ext.get_string(json(text.get(i)),'value');
                                                   WHEN 'dm_a_fechaentrega' THEN dm_a_fechaentrega:=json_ext.get_string(json(text.get(i)),'value');
                                                     WHEN 'dm_a_ubicacion' THEN dm_a_ubicacion:=json_ext.get_string(json(text.get(i)),'value');
                                                      WHEN 'dm_a_equipoanterior' THEN dm_a_equipoanterior:=json_ext.get_string(json(text.get(i)),'value');
                                                     -- WHEN 'dm_a_plazoforzoso' THEN dm_a_plazoforzoso:=json_ext.get_string(json(text.get(i)),'value');
                                                       else null;
                                                END case;
                                            end loop;


                                          FOR n IN 1 .. textempleado.COUNT
                                          loop                                                                               
                                     nemmpleado:=json_ext.get_string(json(textempleado.get(n)),'value'); -- NUMERO EMPLEADO
                                     
                                            
                                                  FOR i IN 1 .. text.COUNT
                                          loop                                                                               
                                                                                       --  respuesta.put('text_'||json_ext.get_string(json(text.get(1)),'id'),json_ext.get_string(json(text.get(1)),'id'));
                                                CASE json_ext.get_string(json(text.get(i)),'id')
                                                WHEN 'dm_a_user_'||nemmpleado THEN dm_a_user:=json_ext.get_string(json(text.get(i)),'value');
                                                  WHEN 'dm_a_estatus_'||nemmpleado THEN dm_a_estatus:=json_ext.get_string(json(text.get(i)),'value');
                                                   WHEN 'dm_a_zona_'||nemmpleado THEN dm_a_zona:=json_ext.get_string(json(text.get(i)),'value');
                                                   WHEN 'dm_a_area_'||nemmpleado THEN dm_a_area:=json_ext.get_string(json(text.get(i)),'value');
                                                     WHEN 'dm_a_depa_'||nemmpleado THEN dm_a_depa:=json_ext.get_string(json(text.get(i)),'value');
                                                     else null;
                                                                                                                         
                                                END case;
                                            end loop;
                                            
                                                if dm_m_tipo2='MOVIL' THEN
                                                
                                                if idcurval is null THEN
                                       
                                             INSERT INTO dpm_eval ( IDTEQU, IDTUSERLOGIN , IDTEMPLEADO ,FECHAIN,    EDO,  OBSERVACIONES ,NOMBRE ,USERSTATUS, USERZONA, USERAREA,USERDEPA,
                                             FECHAENTREGA,USUARIO,CUENTA,VPASSWORD,UBICACION)
                                           VALUES(idequipo,iduser,nemmpleado,sysdate,'NVO',vobservacion, dm_a_user,dm_a_estatus,dm_a_zona,dm_a_area,dm_a_depa,
                                            to_date(dm_a_fechaentrega,'DD/MM/YYYY HH24:MI'), dm_a_usuario,dm_a_cuenta,dm_a_password,dm_a_ubicacion );
                                       COMMIT;
                                       idcurval:=   APP.SQDMP_EVA.currval;
                                       else
                                        INSERT INTO dpm_eval ( IDTEQU, IDTUSERLOGIN , IDTEMPLEADO ,FECHAIN,    EDO,  OBSERVACIONES ,NOMBRE ,USERSTATUS, USERZONA, USERAREA,USERDEPA,
                                             FECHAENTREGA,USUARIO,CUENTA,VPASSWORD,UBICACION,IDTEVAASOCI)
                                           VALUES(idequipo,iduser,nemmpleado,sysdate,'NVO',vobservacion, dm_a_user,dm_a_estatus,dm_a_zona,dm_a_area,dm_a_depa,
                                            to_date(dm_a_fechaentrega,'DD/MM/YYYY HH24:MI'), dm_a_usuario,dm_a_cuenta,dm_a_password,dm_a_ubicacion,idcurval  );
                                       COMMIT;
                                       end if;
                                       
                                       
                                       
                                      ------------------------------------------------------------------------ 
                                       ELSE    if dm_m_tipo2='RADIO' THEN
                                                
                                                if idcurval is null THEN
                                       
                                             INSERT INTO dpm_eval ( IDTEQU, IDTUSERLOGIN , IDTEMPLEADO ,FECHAIN,    EDO,  OBSERVACIONES ,NOMBRE ,USERSTATUS, USERZONA, USERAREA,USERDEPA,
                                             FECHAENTREGA,UBICACION)
                                           VALUES(idequipo,iduser,nemmpleado,sysdate,'NVO',vobservacion, dm_a_user,dm_a_estatus,dm_a_zona,dm_a_area,dm_a_depa,
                                            to_date(dm_a_fechaentrega,'DD/MM/YYYY HH24:MI'),dm_a_ubicacion
                                           );
                                       COMMIT;
                                       idcurval:=   APP.SQDMP_EVA.currval;
                                       else
                                        INSERT INTO dpm_eval ( IDTEQU, IDTUSERLOGIN , IDTEMPLEADO ,FECHAIN,    EDO,  OBSERVACIONES ,NOMBRE ,USERSTATUS, USERZONA, USERAREA,USERDEPA,
                                             FECHAENTREGA,UBICACION,IDTEVAASOCI)
                                           VALUES(idequipo,iduser,nemmpleado,sysdate,'NVO',vobservacion, dm_a_user,dm_a_estatus,dm_a_zona,dm_a_area,dm_a_depa,
                                            to_date(dm_a_fechaentrega,'DD/MM/YYYY HH24:MI'), dm_a_ubicacion,idcurval  );
                                       COMMIT;
                                       end if;
                                       
                                       
                                              ------------------------------------------------------------------------ 
                                       ELSE    if dm_m_tipo2='SIM' THEN
                                                
                                                if idcurval is null THEN
                                       
                                             INSERT INTO dpm_eval ( IDTEQU, IDTUSERLOGIN , IDTEMPLEADO ,FECHAIN,    EDO,  OBSERVACIONES ,NOMBRE ,USERSTATUS, USERZONA, USERAREA,USERDEPA,
                                             FECHAENTREGA)
                                           VALUES(idequipo,iduser,nemmpleado,sysdate,'NVO',vobservacion, dm_a_user,dm_a_estatus,dm_a_zona,dm_a_area,dm_a_depa,
                                            to_date(dm_a_fechaentrega,'DD/MM/YYYY HH24:MI')   );
                                       COMMIT;
                                        idcurval:=   APP.SQDMP_EVA.currval;
                                       else
                                        INSERT INTO dpm_eval ( IDTEQU, IDTUSERLOGIN , IDTEMPLEADO ,FECHAIN,    EDO,  OBSERVACIONES ,NOMBRE ,USERSTATUS, USERZONA, USERAREA,USERDEPA,
                                             FECHAENTREGA,IDTEVAASOCI)
                                           VALUES(idequipo,iduser,nemmpleado,sysdate,'NVO',vobservacion, dm_a_user,dm_a_estatus,dm_a_zona,dm_a_area,dm_a_depa,
                                            to_date(dm_a_fechaentrega,'DD/MM/YYYY HH24:MI'),idcurval  );
                                       COMMIT;
                                       end if;
                                       
                                      
                                       
                                       END IF;
                                         END IF;
                                        END IF;
                                        
                                        
                               
                                            
                                              end loop;
                                            
                                            
                                            
                                            
                                   
                                        
                                       
     respuesta.put('msg','Datos insertados correctamente');
    else
      respuesta.put('permiso','negado, registrese como operativo');
       respuesta.put('status',0);
    end if;

     -- respuesta.put('validaarchivo',temp2);
else
    respuesta.put('status',0);
             respuesta.put('error','Token expirado');
                    respuesta.put('msg','No se pudo ingresar dato, inicie sesion nuevamente');
    end if;




    cadena := empty_clob();
    dbms_lob.createtemporary(cadena, true);
    respuesta.to_clob(cadena, true);

    RETURN '['||cadena||']';
EXCEPTION
    when NO_DATA_FOUND then
        respuesta:=json();
        respuesta.put('status',0);
        respuesta.put('msg','No se encontro datos');
        respuesta.put('error',SQLERRM);
        respuesta.put('lineaError',' lineaError -> '||DBMS_UTILITY.Format_Error_BackTrace);
        return '['||respuesta.to_char()||']';
    when OTHERS then
        respuesta:=json();
        respuesta.put('msg','ocurrio un error.'|| ' lineaError -> '||DBMS_UTILITY.Format_Error_BackTrace );
        respuesta.put('error',SQLERRM);
        respuesta.put('lineaError',' lineaError -> '||DBMS_UTILITY.Format_Error_BackTrace);
        respuesta.put('status',0);
        return '['||respuesta.to_char()||']';
 END insertDato2;
 -- --------------------------------------------------------------------------------------------------
  /*  __________________________________________________________________________________________________  */
FUNCTION showbitacora (vcarcamo in varchar2,fecha1 in varchar2,fecha2 in varchar2,vturno in number,voperador  in number) RETURN clob IS
Cont NUMBER(10):=0;
    cadena            clob;
    temp            json;
    temp2            json;
     EQUipojson            json;
      medidajson            json;
    respuesta        json;
    datacliente        json;
  descifrar VARCHAR2(4000);
            BEGIN
       temp2 :=json();
      DECLARE
               CURSOR C_uso    IS 
               SELECT    IDTEQU,IDTDMP,IDMOVIL,MARCA,MODELO,SERIE,IMEI,TELEFONO,IDTELCOMPLETO,COMPANIA,COLOR,FUNDA,MICA,CARGADOR,OTRACAR,FECHAIN,FECHAUPD,FECHARECEPCION,SIM,MARCARAPIDA,
                (SELECT l.valor FROM app.dpm_VARS l where l.IDTVAR=STATUS) STATUS         ,
               COMENTARIO,PLAZOFORZOSO,
              (SELECT l.display_name FROM app.lgn_user l where l.id_user=IDTUSERLOGIN) USERLOGIN 
               FROM app.dpm_equi where  IDTDMP= vcarcamo             and 
TO_DATE(to_char(TRUNC(FECHAIN),'MM/DD/YYYY'),'MM/DD/YYYY')
BETWEEN  TO_DATE(fecha1,'MM/DD/YYYY') and TO_DATE(fecha2,'MM/DD/YYYY') 
order by FECHAIN asc;
               
                    BEGIN
       FOR ind IN C_uso LOOP
   Cont:=Cont+1;
          temp :=json();
            -- temp.put('ID',ind.IDTEVA);
         temp.put('IDTEQU',ind.IDTEQU);
             temp.put('FECHA',to_char(ind.FECHAIN,'MM/DD/YYYY'));
              temp.put('FECHAUPD',to_char(ind.FECHAUPD,'MM/DD/YYYY HH24:MI'));
              
               temp.put('FECHAREGISTRO',to_char(ind.FECHARECEPCION,'MM/DD/YYYY HH24:MI'));
               temp.put('PLAZOFORZOSO',to_char(ind.PLAZOFORZOSO,'MM/DD/YYYY HH24:MI'));
              temp.put('hora',to_char(ind.FECHAIN,'HH24:MI'));
               temp.put('IDTDMP',ind.IDTDMP);
                temp.put('IDMOVIL',ind.IDMOVIL);
                 temp.put('MARCA',ind.MARCA);
                 temp.put('MODELO',ind.MODELO);
                  temp.put('SIM',ind.SIM);
                temp.put('SERIE',ind.SERIE);
                 temp.put('IMEI',ind.IMEI);
                  temp.put('TELEFONO',ind.TELEFONO);
                   temp.put('IDTELCOMPLETO',ind.IDTELCOMPLETO);
                   temp.put('MARCARAPIDA',ind.MARCARAPIDA);
                   
                    temp.put('COMPANIA',ind.COMPANIA);
                     temp.put('COLOR',ind.COLOR);
                      temp.put('FUNDA',ind.FUNDA);
                       temp.put('MICA',ind.MICA);
                        temp.put('CARGADOR',ind.CARGADOR);
                         temp.put('OTRACAR',ind.OTRACAR);
                          temp.put('STATUS',ind.STATUS);
                           temp.put('USERLOGIN',ind.USERLOGIN);
                 temp.put('COMENTARIO',ind.COMENTARIO);
             -------------------------------------------------------------    
     /*                        DECLARE 
                             tempeqi json;
                             CURSOR C_EQUIPO IS SELECT e.IDTEVA, decode(e.edo,'E','Encendido','A','Apagado','M','Mantenimiento',e.edo) edo ,equi.EQUIPO,e.medida  FROM cco_eval e,cco_equi equi
            WHERE --e.edo is not null          and
            e.VIDTCAR=equi.IDTCAR 
            and  e.IDTEQU=equi.IDTEQU
            and  e.fcheva = ind.FCHEVA order by equi.IDTEQU  asc ;
            BEGIN
             EQUipojson:= json();

              FOR e IN C_EQUIPO LOOP
              tempeqi:= json();
             tempeqi.put('edo',e.edo);
              tempeqi.put('equipo',e.EQUIPO);
               tempeqi.put('medida',e.medida); 
                EQUipojson.put(e.IDTEVA,tempeqi);
              END LOOP;
                temp.put('equipo',EQUipojson);
            END;
             -------------------------------------------------------------    
   */
                 temp2.put(Cont,temp);


         END LOOP;
      END;



    respuesta :=json();
    respuesta.put('bitacora',temp2);
    --respuesta.put('datacliente',datacliente);
    respuesta.put('status',1);
    respuesta.put('msg','todo ok');

    cadena := empty_clob();
    dbms_lob.createtemporary(cadena, true);
    respuesta.to_clob(cadena, true);
    --dbms_output.put_line(cadena);
    --dbms_lob.freetemporary(cadena);
    RETURN '['||cadena||']';
EXCEPTION
    when NO_DATA_FOUND then
        respuesta:=json();
        respuesta.put('status',0);
        respuesta.put('msg','No se encontro dato');
        return '['||respuesta.to_char()||']';
    when OTHERS then
        respuesta:=json();
        respuesta.put('msg','ocurrio un error.'|| ' lineaError -> '||DBMS_UTILITY.Format_Error_BackTrace );
        respuesta.put('error',SQLERRM);
        respuesta.put('lineaError',' lineaError -> '||DBMS_UTILITY.Format_Error_BackTrace);
        respuesta.put('status',0);
        return '['||respuesta.to_char()||']';
END;
/*  __________________________________________________________________________________________________  */


 /*  __________________________________________________________________________________________________  */
FUNCTION showbitacora2 (vcarcamo in varchar2,fecha1 in varchar2,fecha2 in varchar2,vturno in number,voperador  in number) RETURN clob IS
Cont NUMBER(10):=0;
    cadena            clob;
    temp            json;
    temp2            json;
     EQUipojson            json;
      medidajson            json;
    respuesta        json;
    datacliente        json;
  descifrar VARCHAR2(4000);
            BEGIN
       temp2 :=json();
      DECLARE
               CURSOR C_uso    IS 
SELECT D.IDTEVA,D.IDTEQU,D.IDTUSERLOGIN,D.IDTEMPLEADO,D.FECHAIN,D.FECHAUP,D.EDO,D.OBSERVACIONES,D.IDTEVAASOCI,D.NOMBRE,D.USERSTATUS,D.USERZONA,D.USERAREA,D.USERDEPA,D.FECHAENTREGA,
   D.USUARIO,D.CUENTA,D.VPASSWORD,D.UBICACION,D.COMENTARIOS,
              (SELECT l.display_name FROM app.lgn_user l where l.id_user=D.IDTUSERLOGIN) USERLOGIN ,
                (SELECT l.display_name FROM app.lgn_user l where l.id_user=D.IDTUSERLOGIN2) USERLOGIN2 ,
                E.IDTDMP, E.IDMOVIL, E.SIM, E.TELEFONO, E.SERIE
               FROM app.dpm_eval D, APP.DPM_EQUI E where   E.IDTDMP= vcarcamo AND  D.IDTEQU=E.IDTEQU  and TO_DATE(to_char(TRUNC(D.FECHAIN),'MM/DD/YYYY'),'MM/DD/YYYY') BETWEEN  TO_DATE(fecha1,'MM/DD/YYYY') and TO_DATE(fecha2,'MM/DD/YYYY') 
                order by D.FECHAIN asc;
                
                    BEGIN
       FOR ind IN C_uso LOOP
   Cont:=Cont+1;
          temp :=json();
             temp.put('IDTEVA',ind.IDTEVA);
         temp.put('IDTEQU',ind.IDTEQU);
         temp.put('IDTDMP',ind.IDTDMP);
          temp.put('IDMOVIL',ind.IDMOVIL);
           temp.put('SIM',ind.SIM);
            temp.put('SERIE',ind.SERIE);
           temp.put('TELEFONO',ind.TELEFONO);
            temp.put('IDTEMPLEADO',ind.IDTEMPLEADO);
             temp.put('FECHA',to_char(ind.FECHAIN,'MM/DD/YYYY'));
              temp.put('FECHAUPD',to_char(ind.FECHAUP,'MM/DD/YYYY HH24:MI'));
               temp.put('FECHAENTREGA',to_char(ind.FECHAENTREGA,'MM/DD/YYYY HH24:MI'));
              --  temp.put('PLAZOFORZOSO',to_char(ind.PLAZOFORZOSO,'MM/DD/YYYY HH24:MI'));
              temp.put('hora',to_char(ind.FECHAIN,'HH24:MI'));
              temp.put('EDO',ind.edo);
              if ind.edo='NVO' then 
                  temp.put('EDO2','Asignado');
                  else 
                  temp.put('EDO2','DesAsignado');
                  end if;
                  temp.put('OBSERVACIONES',ind.OBSERVACIONES);
                    temp.put('COMENTARIOS',ind.COMENTARIOS);
                 temp.put('IDTEVAASOCI',ind.IDTEVAASOCI);
                  temp.put('NOMBRE',ind.NOMBRE);
                   temp.put('USERSTATUS',ind.USERSTATUS);
                    temp.put('USERZONA',ind.USERZONA);
                     temp.put('USERAREA',ind.USERAREA);
                      temp.put('USERDEPA',ind.USERDEPA);
                       temp.put('USUARIO',ind.USUARIO);
                        temp.put('CUENTA',ind.CUENTA);
                         temp.put('VPASSWORD',ind.VPASSWORD);
                          temp.put('UBICACION',ind.UBICACION);
                           temp.put('USERLOGIN',ind.USERLOGIN);
                           temp.put('USERLOGIN2',ind.USERLOGIN2);
    
                 temp2.put(Cont,temp);


         END LOOP;
      END;



    respuesta :=json();
    respuesta.put('bitacora',temp2);
    --respuesta.put('datacliente',datacliente);
    respuesta.put('status',1);
    respuesta.put('msg','todo ok');

    cadena := empty_clob();
    dbms_lob.createtemporary(cadena, true);
    respuesta.to_clob(cadena, true);
    --dbms_output.put_line(cadena);
    --dbms_lob.freetemporary(cadena);
    RETURN '['||cadena||']';
EXCEPTION
    when NO_DATA_FOUND then
        respuesta:=json();
        respuesta.put('status',0);
        respuesta.put('msg','No se encontro dato');
        return '['||respuesta.to_char()||']';
    when OTHERS then
        respuesta:=json();
        respuesta.put('msg','ocurrio un error.'|| ' lineaError -> '||DBMS_UTILITY.Format_Error_BackTrace );
        respuesta.put('error',SQLERRM);
        respuesta.put('lineaError',' lineaError -> '||DBMS_UTILITY.Format_Error_BackTrace);
        respuesta.put('status',0);
        return '['||respuesta.to_char()||']';
END;
/*  __________________________________________________________________________________________________  */


 FUNCTION variables (idcar json) RETURN CLOB IS 

 vcar        varchar2(20);
 vjson1      json;
 vjson2      json;
 vjson_list1 json_list;
 vvariables  clob;
  CURSOR cvariables(idcarc app.cco_vars.idtvar%type) IS 
    SELECT * FROM APP.CCO_EQUI where idtcar = idcarc order by IDTEQU asc;
 BEGIN 
 gobj:=idcar;
 vjson1      :=json();
 vjson2      :=json();
 vjson_list1 :=json_list();
 vcar := json_ext.get_string(gobj, 'idcar');
 --return vcar;
    FOR vvariable IN cvariables (vcar) LOOP
        vjson2.put('idEqui',vvariable.idtequ);
        vjson2.put('idtcar',vvariable.idtcar);
        vjson2.put('equipo',vvariable.equipo);
        vjson2.put('edo',vvariable.edo);
        vjson2.put('medida',vvariable.medida);
        vjson_list1.append(vjson2.to_json_value);
    END LOOP;
    vjson1.put('Variables', vjson_list1.to_json_value);
    dbms_lob.createtemporary(vvariables, true);
    vjson1.to_clob(vvariables);
    RETURN vvariables;
 END variables;


  FUNCTION INVOCA(pjsontxt in varchar2) return clob is
        vval APP.FMT_VARIABLES.VALOR%TYPE;
        vdes APP.FMT_VARIABLES.DESCRIPCION%TYPE;
        japi varchar2(6);
        jver varchar2(6);
        jmtd varchar2(40);
        dpr varchar2(6);

          action varchar2(100);
           oratkn varchar2(4000);
            vcarcamo varchar2(30);

        fecha1 varchar2(14);
        fecha2 varchar2(14);
        vturno number (1);
        voperador number (3);
         vfolio number (10);
    BEGIN
        if not vjson(pjsontxt) then return jmsgerr('FMT001'); end if;
        japi:=trim(json_ext.get_string(gobj,'api'));
        jver:=trim(json_ext.get_string(gobj,'ver'));
        jmtd:=trim(json_ext.get_string(gobj,'mtd'));
        action:=trim(json_ext.get_string(gobj,'action'));
        oratkn:=trim(json_ext.get_string(gobj,'oratkn'));

        vcarcamo:=trim(json_ext.get_string(gobj,'carcamo'));
         vfolio:=to_number(json_ext.get_string(gobj,'folio'));
          fecha1 :=trim(json_ext.get_string(gobj,'fecha1'));
        fecha2 :=trim(json_ext.get_string(gobj,'fecha2'));
        vturno :=to_number(trim(json_ext.get_string(gobj,'turno')));
        voperador  :=to_number(trim(json_ext.get_string(gobj,'operador')));

        if (japi is null or jver is null or jmtd is null) then return jmsgerr('DPM001'); end if;
        gobj.remove('api');
        gobj.remove('ver');
        gobj.remove('mtd');
        datavarapi('APIDPM',vval,vdes);
        if vval<>'1' then return jmsgerr('DPM001'); end if;
        case
            when jmtd='carcamos' then
                gobj.remove('auth');
                gobj.remove('code');
                gobj.remove('message');
                gobj.remove('description');
                return carcamos (vfolio);
            when jmtd='operadores' then
                gobj.remove('auth');
                gobj.remove('code');
                gobj.remove('message');
                gobj.remove('description');
                return operadores;
            when jmtd='variables' then
                gobj.remove('auth');
                gobj.remove('code');
                gobj.remove('message');
                gobj.remove('description');
                return variables(gobj);
                when jmtd='dpm' and action='agregarDatoBitacora' then
                return insertDato(gobj,oratkn);
                 when jmtd='dpm' and action='agregarDatoBitacora2' then
                return insertDato2(gobj,oratkn);
                when jmtd='dpm' and action='insertDesasinacion' then
                return insertDesasinacion(gobj,oratkn);
                when jmtd='dpm' and action='showbitacora' then
                return showbitacora(vcarcamo,fecha1,fecha2,vturno,voperador);
                 when jmtd='dpm' and action='showbitacora2' then
                return showbitacora2(vcarcamo,fecha1,fecha2,vturno,voperador);

            else return jmsgerr('DPM003');
        end case;
    EXCEPTION
        when OTHERS then
            --return jmsgerr('DB001');

            return (SQLERRM || chr(13) || chr(10) || DBMS_UTILITY.Format_Error_BackTrace);
    END;
/*  __________________________________________________________________________________________________  */

END API_PQDPM_1_0;
/
