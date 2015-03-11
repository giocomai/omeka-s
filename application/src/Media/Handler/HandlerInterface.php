<?php
namespace Omeka\Media\Handler;

use Omeka\Api\Representation\Entity\MediaRepresentation;
use Omeka\Api\Request;
use Omeka\Model\Entity\Media;
use Omeka\Stdlib\ErrorStore;
use Zend\View\Renderer\PhpRenderer;

/**
 * Interface for media handlers.
 *
 * Each handler corresponds to one media type.
 */
interface HandlerInterface
{
    /**
     * Validate a request for compliance with this media type.
     *
     * @param Request $request The API request to validate
     * @param ErrorStore $errorStore
     */
    public function validateRequest(Request $request, ErrorStore $errorStore);

    /**
     * Process the ingest request and update the Media entity.
     *
     * @param Media $media
     * @param Request $request
     * @param ErrorStore $errorStore
     */
    public function ingest(Media $media, Request $request, ErrorStore $errorStore);

    /**
     * Return the HTML necessary to render an add/edit form.
     *
     * @param PhpRenderer $view
     * @param array $options
     * @return string
     */
    public function form(PhpRenderer $view, array $options = array());

    /**
     * Return the HTML necessary to render the provided media.
     *
     * @param PhpRenderer $view
     * @param MediaRepresentation $media
     * @param array $options
     * @return string
     */
    public function render(PhpRenderer $view, MediaRepresentation $media, array $options = array());
}