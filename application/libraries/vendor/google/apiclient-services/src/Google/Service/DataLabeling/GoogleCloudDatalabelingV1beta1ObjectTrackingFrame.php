<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ObjectTrackingFrame extends Google_Model
{
  protected $boundingPolyType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1BoundingPoly';
  protected $boundingPolyDataType = '';
  protected $normalizedBoundingPolyType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1NormalizedBoundingPoly';
  protected $normalizedBoundingPolyDataType = '';
  public $timeOffset;

  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1BoundingPoly
   */
  public function setBoundingPoly(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1BoundingPoly $boundingPoly)
  {
    $this->boundingPoly = $boundingPoly;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1BoundingPoly
   */
  public function getBoundingPoly()
  {
    return $this->boundingPoly;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1NormalizedBoundingPoly
   */
  public function setNormalizedBoundingPoly(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1NormalizedBoundingPoly $normalizedBoundingPoly)
  {
    $this->normalizedBoundingPoly = $normalizedBoundingPoly;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1NormalizedBoundingPoly
   */
  public function getNormalizedBoundingPoly()
  {
    return $this->normalizedBoundingPoly;
  }
  public function setTimeOffset($timeOffset)
  {
    $this->timeOffset = $timeOffset;
  }
  public function getTimeOffset()
  {
    return $this->timeOffset;
  }
}
