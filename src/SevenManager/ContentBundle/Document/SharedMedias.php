<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 14/10/15
 * Time: 10:16
 */

    namespace SevenManager\ContentBundle\Document;

    use PHPCR\NodeInterface;
    use Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr\Image;
    use Symfony\Cmf\Bundle\MediaBundle\ImageInterface;
    use Symfony\Component\HttpFoundation\File\UploadedFile;

    trait SharedMedias
    {

        /**
         * @var Image
         */
        protected $image;

        /**
         * Set the image for this block.
         *
         * Setting null will do nothing, as this is what happens when you edit this
         * block in a form without uploading a replacement file.
         *
         * If you need to delete the Image, you can use getImage and delete it with
         * the document manager. Note that this block does not make much sense
         * without an image, though.
         *
         * @param ImageInterface|UploadedFile|null $image optional the image to update
         *
         * @return $this
         *
         * @throws \InvalidArgumentException If the $image parameter can not be handled.
         */
        public function setImage($image = null)
        {
            if (!$image) {
                return $this;
            }

            if (!$image instanceof ImageInterface && !$image instanceof UploadedFile) {
                $type = is_object($image) ? get_class($image) : gettype($image);

                throw new \InvalidArgumentException(sprintf(
                    'Image is not a valid type, "%s" given.',
                    $type
                ));
            }

            if ($this->image) {
                // existing image, only update content
                // TODO: https://github.com/doctrine/phpcr-odm/pull/262
                $this->image->copyContentFromFile($image);
            } elseif ($image instanceof ImageInterface) {
                $image->setName('image'); // ensure document has right name
                $this->image = $image;
            } else {
                $this->image = new Image();
                $this->image->copyContentFromFile($image);
            }

            return $this;
        }

        /**
         * Get image
         *
         * @return Image
         */
        public function getImage()
        {
            return $this->image;
        }
    }