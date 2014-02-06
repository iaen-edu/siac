<?php

class Model_Informacion_Personal extends \Orm\Model {

    protected static $_properties = array(
        'id',
        'usuario_id' => array(
            'data_type' => 'string',
            'label' => ' Usuario',
            'form' => array(
                'type' => 'hidden',
                'class' => 'form-control',
                'placeholder' => "Escriba su nombre"
            )
        ),
        'nombre' => array(
            'data_type' => 'string',
            'label' => ' Nombre',
            'validation' => array('required','validatexto'=>array(10)),
            'form' => array('type' => 'text',
                'class' => 'form-control',
                'placeholder' => "Escriba su nombre"
            )
        ),
        'apellido' => array(
            'data_type' => 'string',
            'label' => 'Apellido',
             'validation' => array('required','validatexto'=>array(10)),
            'form' => array('type' => 'text',
                'class' => 'form-control',
                'placeholder' => "Escriba su apellido"
            )
        ),
        'identificador' => array(
            'data_type' => 'string',
            'label' => 'ID',
            'validation' => array('required','max_length' => array(15), 'min_length' => array(5)),
            'form' => array('type' => 'text',
                'class' => 'form-control',
                'placeholder' => "Ejemplo: 0705206687"
            )
        ),
        'tipo_identificador' => array(
            'data_type' => 'string',
            'label' => 'Tipo de Documento',
            'form' => array('type' => 'select',
                'class' => 'form-control',
                //'placeholder' => "Seleccione el tipo de documento",
                'options' => array(1 => 'Cédula', 2 => 'Pasaporte'),
                'selected'=>'none',
            ),
        ),
        'pais_id' => array(
            'data_type' => 'int',
            'label' => 'País',
            'form' => array('type' => 'hidden', 'class' => 'form-control','autocomplete'=>'off',
            )
        ),
        'ciudad_residencia_id' => array(
            'data_type' => 'int',
            'label' => 'Ciudad de Residencia',
            'form' => array('type' => 'hidden', 'class' => 'form-control')
        ),
        'direccion' => array(
            'data_type' => 'string',
            'label' => 'Dirección',
            'validation' => array('required','validatexto'=>array(10)),
            'form' => array('type' => 'textarea', 'class' => 'form-control',
                'placeholder' => "Escriba su dirección"
            )
        ),
        'telefono' => array(
            'data_type' => 'string',
            'label' => 'Teléfono',
             'validation' => array('required','max_length' => array(15), 'min_length' => array(5)),
            'form' => array('type' => 'text', 'class' => 'form-control',
                'placeholder' => "Escriba  su teléfono"
            )
        ),
        'correo' => array(
            'data_type' => 'string',
            'label' => 'Correo',
            'validation' => array('required', 'valid_email','max_length' => array(80), 'min_length' => array(5)),
            'form' => array('type' => 'email', 'class' => 'form-control',
                'placeholder' => "Escriba su correo"
            )
        ),
        'conadis' => array(
            'data_type' => 'string',
            'label' => 'Conadis',
             'validation' => array('required','max_length' => array(15), 'min_length' => array(5)),
            'form' => array('type' => 'text', 'class' => 'form-control',
                'placeholder' => "N° de carnet"
            )
        ),
        'ruta_foto' => array(
            'data_type' => 'string',
            'label' => 'Seleccione la foto',
            'form' => array(
                'type' => 'file', 'class' => 'form-control')
        ),
        'created_at' => array(
            'data_type' => 'int',
            'form' => array('type' => 'hidden', 'class' => 'form-control'
            )
        ),
        'updated_at' => array(
            'data_type' => 'int',
            'form' => array('type' => 'hidden', 'class' => 'form-control'
            )
        ),
    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_update'),
            'mysql_timestamp' => false,
        ),
    );
    
    protected static $_table_name = 'informacion_personals';
    
    protected static $_belongs_to = array(
        'usuarios' => array(
            'model_to' => 'Model_Usuario',
            'key_from' => 'usuario_id',
            'key_to' => 'id',
        ),
    );
    
    protected static $_has_many = array(
        'instrucciones'=> array(
            'key_from'=>'id',
            'model_to'=>'Model_Conf_Instruccion',
            'key_to'=>'id_perfil',
        ),
        'laboral'=> array(
            'key_from'=>'id',
            'model_to'=>'Model_Explaboral',
            'key_to'=>'id_personal',
        ),
        'capacitacion'=> array(
            'key_from'=>'id',
            'model_to'=>'Model_Histcapacitacion',
            'key_to'=>'id_personal',
        ),
        'idioma'=> array(
            'key_from'=>'id',
            'model_to'=>'Model_Idioma',
            'key_to'=>'id_personal',
        ),
        'publicacion'=> array(
            'key_from'=>'id',
            'model_to'=>'Model_Publicacion',
            'key_to'=>'id_personal',
        ),
        'proyecto'=> array(
            'key_from'=>'id',
            'model_to'=>'Model_Proyecto',
            'key_to'=>'id_personal',
        ),
        'tesis'=> array(
            'key_from'=>'id',
            'model_to'=>'Model_Tesi',
            'key_to'=>'id_personal',
        ),
    );
    
    protected static $_has_one = array(
        'conf_paises'=> array(
            'key_from'=>'pais_id',
            'model_to'=>'Model_Conf_Paise',
            'key_to'=>'id',
        ),
        'conf_ciudades'=> array(
            'key_from'=>'ciudad_residencia_id',
            'model_to'=>'Model_Conf_Ciudade',
            'key_to'=>'id',
        )
    );

}
