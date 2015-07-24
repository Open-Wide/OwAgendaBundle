<?php

class Agenda_003_EventAgenda {
 
    public function up( ) {
        $migration = new OWMigrationContentClass( );
        $migration->startMigrationOn( 'event_agenda' );
        $migration->createIfNotExists( );
 
        $migration->contentobject_name = '<title>';
        $migration->is_container = TRUE;
        $migration->name = 'Evénement';
 
        $migration->addAttribute( 'title', array(
            'is_required' => TRUE,
            'name' => 'Titre'
        ) );
        $migration->addAttribute( 'subtitle', array(
            'name' => 'Sous-titre'
        ) );
        $migration->addAttribute( 'image', array(
            'data_type_string' => 'ezobjectrelation',
            'name' => 'Visuel',
            'selection_method' => 'Browse',
            'default_selection_node' => 'media/logotheque',
            'fuzzy_match' => FALSE
        ) );
        $migration->addAttribute( 'description', array(
            'data_type_string' => 'ezxmltext',
            'is_required' => TRUE,
            'name' => 'Description'
        ) );
        $migration->addAttribute( 'publish_start', array(
            'data_type_string' => 'ezdatetime',
            'description' => 'Date à laquelle l\'événement va apparaitre dans l\'agenda',
            'is_required' => TRUE,
            'name' => 'Date de début de publication',
            'set_with_current_date' => TRUE
        ) );
        $migration->addAttribute( 'publish_end', array(
            'data_type_string' => 'ezdatetime',
            'description' => 'Date à laquelle l\'événement va disparaitre dans l\'agenda',
            'is_required' => TRUE,
            'name' => 'Date de fin de publication',
            'set_with_current_date' => TRUE
        ) );
 
        $migration->addToContentClassGroup( 'Agenda' );
        $migration->end( );
    }
 
    public function down( ) {
        $migration = new OWMigrationContentClass( );
        $migration->startMigrationOn( 'event_agenda' );
        $migration->removeClass( );
    }
}