document.addEventListener('DOMContentLoaded', function() {
    // Modal de cadastro
    const modal = document.getElementById('modal-cadastro');
    const btnAbrirModal = document.getElementById('chamarForm');
    const spanFechar = document.getElementsByClassName('close')[0];
    
    if (btnAbrirModal) {
        btnAbrirModal.addEventListener('click', function(e) {
            e.preventDefault();
            modal.style.display = 'block';
        });
    }
    
    if (spanFechar) {
        spanFechar.addEventListener('click', function() {
            modal.style.display = 'none';
        });
    }
    
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
    
    // Formulário de cadastro
    const formCadastro = document.getElementById('form-cadastro');
    
    if (formCadastro) {
        formCadastro.addEventListener('submit', async function(e) {
            e.preventDefault();
            console.log('Formulário submetido'); // Debug
            
            const senha = document.getElementById('senha').value;
            const confirmaSenha = document.getElementById('confirma-senha').value;
            const erros = document.querySelectorAll('.erro');
            
            // Validação de senha
            if (senha !== confirmaSenha) {
                erros.forEach(erro => {
                    erro.style.display = 'inline';
                    erro.textContent = 'Senhas não coincidem ×';
                });
                return;
            }
            
            // Coletar dados do formulário
            const formData = new FormData(formCadastro);
            const dados = Object.fromEntries(formData.entries());
            
            console.log('Dados a enviar:', dados); // Debug
            
            try {
                const response = await fetch('cadastrar.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams(dados).toString()
                });
                
                const data = await response.json();
                console.log('Resposta:', data); // Debug
                
                if (data.success) {
                    alert('Cadastro realizado com sucesso!');
                    modal.style.display = 'none';
                    formCadastro.reset();
                } else {
                    alert('Erro: ' + data.message);
                }
            } catch (error) {
                console.error('Erro na requisição:', error);
                alert('Erro ao comunicar com o servidor. Verifique o console para detalhes.');
            }
        });
    }
});