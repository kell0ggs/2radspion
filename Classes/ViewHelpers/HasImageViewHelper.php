<?php
/**
 * View helper for checking valid image name.
 */
class Tx_Zweiradspion_ViewHelpers_HasImageViewHelper extends Tx_Fluid_ViewHelpers_IfViewHelper {

	/**
	 * Checks, if the given frontend user has access to the given object
	 *
	 * @param mixed $person The person to be tested for login
	 * @return string The output
	 */
	public function render($img = NULL) {
		if (!empty($img)) { # || $accessControllService->backendAdminIsLoggedIn()
			return $this->renderThenChild();
		} else {
			return $this->renderElseChild();
		}
	}

}


?>