var Modal = (function() {
	/**
	 * id, title, content, cssClass
	 * @param object config
	 * @returns object (jquery)
	 */
	function createModal(config) {
		config.showHeader = (config.showHeader == null ? true : config.showHeader)
		config.showFooter = (config.showFooter == null ? true : config.showFooter)

		$('body').append(
			'<div id="' + config.id + '" class="modal fade in ' + (config.cssModalClass || '') + '" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">'
			+ '<div class="modal-dialog ' + (config.cssDialogClass || '') + '">'
			+ '<div class="modal-content">'
			+ (config.showHeader ?
				'<div class="modal-header">'
				+ '<h4 class="modal-title" id="modalTitle">' + (config.title || '') + '</h4>'
				+ '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'
				+ '</div>'
				: ''
			)
			+ '<div class="modal-body">'
			+ (config.content || '')
			+ '</div>'
			+ (config.showFooter
				? (config.contentFooter ||
					'<div class="modal-footer justify-content-start">'
					+ '<button type="button" id="ok" class="btn btn-success waves-effect waves-light" style="' + (config.okButtonHidden ? 'display:none;' : '') + '">' + (config.okButtonText || 'Guardar') + '</button>'
					+ '<button type="button" id="cancel" class="btn btn-default waves-effect waves-light" data-dismiss="modal" style="' + (config.cancelButtonHidden ? 'display:none;' : '') + '">' + (config.cancelButtonText || 'Cancelar') + '</button>'
					+ '</div>')
				: ''
			)
			+ '</div>'
			+ '</div>'
			+ '</div>'
		);

		return $('#' + config.id);
	}
	/**
	 * title, content, cssClass
	 * @param object (jquery) modal
	 * @param object config
	 * @deprecated ya que siempre debe eliminar el modal del DOM
	 */
	function setValuesModal(modal, config) {
		var modalTitle = modal.find('div.modal-title')
			, modalContent = modal.find('div.modal-body')
			, modalDialog = modal.find('div.modal-dialog')
			, modalOkButton = modal.find('button.btn-info')
			, modalCancelButton = modal.find('button.btn-default');

		modalTitle.html(config.title || modalTitle.html());
		modalContent.html(config.content || modalContent.html());
		modalDialog.removeClass(config.cssDialogClass || '').addClass(config.cssDialogClass || '');
		modalDialog.removeClass(config.cssModalClass || '').addClass(config.cssModalClass || '');
		modalOkButton.html((config.okButtonText || 'Guardar'));
		modalCancelButton.html((config.cancelButtonText || 'Cancelar'));
	}

	return {
		loading: {
			open: function() {
				$(".preloader").css({
					opacity:'0.5'
					, zIndex: '2000'
				}).fadeIn();
			}
			, close: function() {
				$(".preloader").fadeOut().css('opacity', '1');
			}
		}
		, alert: {
			error: function(title, content, functionConfirm) {
				swal({
						title: title || 'Error en el procesamiento'
						, text: content || ''
						, type: 'error'
						, animation: false
					}
					, functionConfirm
				);
			}
			, success: function(title, content, functionConfirm) {
				swal({
						title: title || "Acción realizada"
						, text: content || ''
						, type: 'success'
						, animation: false
					}
					, functionConfirm
				);
			}
			, confirm: function(title, content, functionConfirm) {
				swal({
						title: title || '¿Está seguro de inactivar el registro?'
						, text: content || ''
						, type: 'warning'
						, showCancelButton: true
						, cancelButtonText: 'Cancelar'
						, closeOnCancel: true
						, confirmButtonColor: '#0783e8'
						, confirmButtonText: 'Aceptar'
						, closeOnConfirm: true
						, animation: false
					}
					, function() { setTimeout(functionConfirm, 100); }
				);
			}
		}
		, open: function(config) {
			var modal = $('#' + config.id);
			if (modal.length > 0) {
				modal.remove();
			}
			modal = createModal(config);

			$.extend(config, {show: true});
			modal.modal(config);
			modal.on('hidden.bs.modal', function() {
				modal.remove();
			});
			modal.css({
				overflow: 'auto'
			});
			return modal;
		}
		, close: function(id) {
			var modal = $('#' + id);
			modal.modal('hide');
		}
	}
})();
