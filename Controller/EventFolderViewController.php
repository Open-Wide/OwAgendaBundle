<?php

namespace OpenWide\AgendaBundle\Controller;


class EventFolderViewController extends ViewController
{
    protected function renderLocation( $location, $viewType, $layout = false, array $params = array() )
    {
        switch( $viewType ) {
            case 'full' :
            case 'bloc' :
                $params += $this->getViewFullParams($location,$viewType);
                break;
        }

        return parent::renderLocation( $location, $viewType, $layout, $params );
    }

    protected function getViewFullParams($location,$viewType)
    {
        $repository = $this->getRepository();
        $contentService = $repository->getContentService();

        $content = $contentService->loadContentByContentInfo( $location->getContentInfo() );

        $event_list = $this->getLegacyContentService()->fetchNodeList( array(
            'ParentNodeId' => $location->id,
            'ContentTypeIdentifier' => 'event_liste'
        ) );       

        $listeNodeId = null;
        if(is_array($event_list) && count($event_list)>0){
            $listeNodeId = $event_list[0]->MainNodeID;
        }
       
        $params = array(
            'location' => $location,
            'content' => $content,
            'type' => ($viewType=='full'?'normal':'mini'),
            'listeNodeId' => $listeNodeId
        );

        return $params;
    }

    /**
     * Returns value for $parameterName and fallbacks to $defaultValue if not defined
     *
     * @param string $parameterName
     * @param mixed $defaultValue
     *
     * @return mixed
     */
    public function getConfigParameter( $parameterName, $namespace = null, $scope = null ) {
        if( $this->getConfigResolver()->hasParameter( $parameterName, $namespace, $scope ) ) {
            return $this->getConfigResolver()->getParameter( $parameterName, $namespace, $scope );
        }
    }

    /**
     * Checks if $parameterName is defined
     *
     * @param string $parameterName
     *
     * @return boolean
     */
    public function hasConfigParameter( $parameterName, $namespace = null, $scope = null ) {
        return $this->getConfigResolver()->hasParameter( $parameterName, $namespace, $scope );
    }

    /**
     * Return the legacy content service
     *
     * return OpenWide\Bundle\AgendaBundle\Helper\FetchByLegacy
     */
    public function getLegacyContentService() {
        return $this->container->get( 'open_wide_agenda.fetch_by_legacy' );
    }
}
