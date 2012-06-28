<?php

namespace Zend\Di\Definition;

use Zend\Code\Annotation\AnnotationManager;

class IntrospectionStrategy
{
    /**
     * @var bool
     */
    protected $useAnnotations = false;

    /**
     * @var string[]
     */
    protected $methodNameInclusionPatterns = array('/^set[A-Z]{1}\w*/');

    /**
     * @var string[]
     */
    protected $interfaceInjectionInclusionPatterns = array('/\w*Aware\w*/');

    /**
     * @var AnnotationManager
     */
    protected $annotationManager = null;

    /**
     * Constructor
     *
     * @param null|AnnotationManager $annotationManager
     */
    public function __construct(AnnotationManager $annotationManager = null)
    {
        $this->annotationManager = ($annotationManager) ?: $this->createDefaultAnnotationManager();
    }

    /**
     * Get annotation manager
     *
     * @return null|AnnotationManager
     */
    public function getAnnotationManager()
    {
        return $this->annotationManager;
    }

    /**
     * Create default annotation manager
     *
     * @return AnnotationManager
     */
    public function createDefaultAnnotationManager()
    {
        $annotationManager = new AnnotationManager;
        $annotationManager->registerAnnotation(new Annotation\Inject());
        return $annotationManager;
    }

    /**
     * set use annotations
     *
     * @param bool $useAnnotations
     */
    public function setUseAnnotations($useAnnotations)
    {
        $this->useAnnotations = (bool) $useAnnotations;
    }

    /**
     * Get use annotations
     *
     * @return bool
     */
    public function getUseAnnotations()
    {
        return $this->useAnnotations;
    }

    /**
     * Set method name inclusion pattern
     *
     * @param array $methodNameInclusionPatterns
     */
    public function setMethodNameInclusionPatterns(array $methodNameInclusionPatterns)
    {
        $this->methodNameInclusionPatterns = $methodNameInclusionPatterns;
    }

    /**
     * Get method name inclusion pattern
     *
     * @return array
     */
    public function getMethodNameInclusionPatterns()
    {
        return $this->methodNameInclusionPatterns;
    }

    /**
     * Set interface injection inclusion patterns
     *
     * @param array $interfaceInjectionInclusionPatterns
     */
    public function setInterfaceInjectionInclusionPatterns(array $interfaceInjectionInclusionPatterns)
    {
        $this->interfaceInjectionInclusionPatterns = $interfaceInjectionInclusionPatterns;
    }

    /**
     * Get interface injection inclusion patterns
     *
     * @return array
     */
    public function getInterfaceInjectionInclusionPatterns()
    {
        return $this->interfaceInjectionInclusionPatterns;
    }

}
