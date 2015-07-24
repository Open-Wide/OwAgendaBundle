<?php

class Agenda_001_EventFolder {
 
    public function up( ) {
        $migration = new OWMigrationContentClass( );
        $migration->startMigrationOn( 'event_folder' );
        $migration->createIfNotExists( );
 
        $migration->contentobject_name = ' <short_name|name> ';
        $migration->is_container = TRUE;
        $migration->name = 'Calendrier';
 
        $migration->addAttribute( 'name', array(
            'is_required' => TRUE,
            'name' => 'Title',
            'max_length' => 255
        ) );
        $migration->addAttribute( 'short_name', array(
            'name' => 'Short title',
            'max_length' => 100
        ) );
 
        $migration->addToContentClassGroup( 'Agenda' );
        $migration->end( );
    }
 
    public function down( ) {
        $migration = new OWMigrationContentClass( );
        $migration->startMigrationOn( 'event_folder' );
        $migration->removeClass( );
    }
}