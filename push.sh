if test $# -eq 0
then
    echo "Tu oublies le message de commit Morgane !"
else
    
    echo "ecrivez velo : "
    mysqldump -h localhost -u velo -p --opt velo > BaseDeDonnee/script.sql
    
    git add -A
    git commit -m "${*}"

    echo "done"
    git push
fi
