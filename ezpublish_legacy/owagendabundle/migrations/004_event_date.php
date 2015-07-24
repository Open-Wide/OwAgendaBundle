<?php

class Agenda_004_EventDate{ 
 
    public function up( ) {
        $migration = new OWMigrationContentClass( );
        $migration->startMigrationOn( 'event_date' );
        $migration->createIfNotExists( );
 
        $migration->contentobject_name = '<date_start - date_end>';
        $migration->name = 'Date Lieu';
 
        $migration->addAttribute( 'date_start', array(
            'data_type_string' => 'ezdate',
            'is_required' => TRUE,
            'name' => 'Date de début'
        ) );
        $migration->addAttribute( 'date_end', array(
            'data_type_string' => 'ezdate',
            'name' => 'Date de fin'
        ) );
        $migration->addAttribute( 'hour_start', array(
            'data_type_string' => 'eztime',
            'is_required' => TRUE,
            'is_searchable' => FALSE,
            'name' => 'Horaire de début'
        ) );
        $migration->addAttribute( 'hour_end', array(
            'data_type_string' => 'eztime',
            'is_required' => TRUE,
            'is_searchable' => FALSE,
            'name' => 'Horaire de fin'
        ) );
        $migration->addAttribute( 'duration', array(
            'data_type_string' => 'eztime',
            'is_required' => TRUE,
            'is_searchable' => FALSE,
            'name' => 'Durée'
        ) );
 
        $migration->addToContentClassGroup( 'Agenda' );
        $migration->end( );
    }
 
    public function down( ) {
        $migration = new OWMigrationContentClass( );
        $migration->startMigrationOn( 'event_date' );
        $migration->removeClass( );
    }
}