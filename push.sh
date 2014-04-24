if test $# -eq 0
then
    echo "tu oublies le message de commit"
else
    
    echo "ecrivez velo : "
    mysqldump -h localhost -u velo -p --opt velo > BaseDeDonnee/script.sql
    
    git add -A
    git commit -m "${*}"

    echo "done"
    git push
fi
