<?php

class Agenda_002_EventListe {
 
    public function up( ) {
        $migration = new OWMigrationContentClass( );
        $migration->startMigrationOn( 'event_liste' );
        $migration->createIfNotExists( );
 
        $migration->contentobject_name = ' <short_name|name> ';
        $migration->name = 'Liste d\'événements';
 
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
        $migration->startMigrationOn( 'event_liste' );
        $migration->removeClass( );
    }
}